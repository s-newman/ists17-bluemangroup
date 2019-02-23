# bluemangroup

Blue Man Group is the codename for the Blue Team infrastructure component of ISTS17.

## Deployment
**Please note** that deployment was performed one team at a time, instead of
deploying against all teams at once. The rest of this guide will assume that
you are also deploying against one team at a time. However, deploying against
all teams at the same time should not be difficult.

For ISTS 17, we deployed 14 teams in total - teams 1-13 were for competitiors,
and team 0 was an unused team for testing deployment and red team activities.
This guide will use team 0 as the example deployment team.

### Phase 0: Prerequisite Setup
Before you can use this repository to deploy any teams, you will need to create
templates for each host in the host reference tables below. Each template's
hostname should be configured with the hostname listed in the tables below. In
addition, all templates must be accessible via Ansible. Make sure to configure
the files in `group_vars` properly.

Lastly, the network you use to deploy must have Windows DHCP and DNS set up.
Windows is specifically required because of the interaction between the DHCP
and DNS services. DHCP must be configured (in addition to typical options) to
send a domain name and update DNS records for clients. This will be used for
initial connectivity before hosts are assigned static IP addresses.

### Phase 1: Static IPs
Once a team's VMs are cloned out, they should get DHCP leases and the Windows
DHCP/DNS server should create DNS records for their temporary IP addresses.
Before doing anything else, ensure that the entire team is reachable using
Ansible. You can use the following commands to do so:
```bash
ansible team0 -i inventory.yml -m ping -l linux         # Linux host testing
ansible team0 -i inventory.yml -m ping -l bsd           # BSD host testing
ansible team0 -i inventory.yml -m win_ping -l windows   # Windows host testing
```

Attila may have some issues getting DHCP because interfaces do not always get
consistent names. If it does not get DHCP, you will have to log in manually and
fix the interface script. See the [distribution documentation](https://wiki.cucumberlinux.com/wiki/sysconfig:networking)
for further details on configuring networking on Cucumber Linux. Also, you may
have to configure the static IP addresses for Attila manually due to the above
issue with interface naming.

Next, generate the `machines` variable block in `group_vars/all.yml` using the
`generateMachines.sh` script. Make sure to double-check that the script is
setting the correct IP addresses for your environment. At the time this
document was written, the script is configured to use the IP addresses shown in
the host reference tables below. After removing the old `machines` and
`hostnames` variables, you can use the following command to generate the
variable block:
```bash
./generateMachines.sh >> group_vars/all.yml
```

Once Ansible connectivity is verified, run the `static-ips.yml` playbook on the
team to configure the static IP addresses. You can use the following command to
do so:
```bash
ansible-playbook static-ips.yml -i inventory.yml -l team0
```

Once the playbook is complete, delete the old A and PTR records in the blue
team DNS zones and replace them with records that point to the newly-set static
IP addresses. Finally, restart all of the team's boxes so the networking
changes take affect. A hard reset is acceptable.

Once the team's VMs are back up, verify Ansible connectivity using the ad-hoc
Ansible commands shown above. You may have to flush the DNS cache on the
Ansible deployment host in order to properly resolve the newly-created DNS
records. After connectivity has been verified, take a "Pre-deployment" snapshot
of the VM in vCenter _without including memory_.

### Phase 2: Service Deployment
Now that static IP addresses are set and the hosts can be connected to, you
should be able to start deployment. This is as simple as running the following
command:
```bash
ansible-playbook deploy.yml -i inventory.yml -l team0
```

Please note that the playbook will fail the first time you run it once it
starts trying to add domain users. This is because the domain controller has
not finished restarting. Our Ansible doesn't do a good job at waiting for the
domain controller to configure itself, so you'll just have to watch the console
to wait for Alexander to reboot. Once it's rebooted, just re-run the playbook
with the same command as listed above.

Once the playbook is finished, you should verify that all the services are
functioning properly. We didn't do any molecule tests or any sort of CI for the
Ansible this year (I'm a sad boi about it). The recommended way for testing is
to set up [the scoring engine](https://github.com/scoringengine/scoringengine)
for all teams you will deploy. Once a service is passing checks, you should be
good to go with it.

After a host is passing all of it's service checks, delete the "Pre-deployment"
snapshot and consolidate the disks. Then, take a "Post-deployment" snapshot,
once again _without including memory_. You are now ready to deploy the next
team!

## Network Topology
![ISTS 17 topology](network.png)

## Host Reference
Notes about "global" services:
- WinRM on all Windows hosts using local accounts
- SSH on all Linux/Unix hosts using local accounts

### Internal Network
Blueteam-managed network  
Console access provided  
Network: 10.2.X.0/24  
Gateway: 10.2.X.254  
Domain: teamX.ists.io  

| Hostname    | Role                | IP          | OS                      | Services                | Notes |
|-------------|---------------------|-------------|-------------------------|-------------------------|-------|
| Alexander   | Domain Controller   | 10.2.X.1    | Windows Server 2016     | LDAP, DNS               | GUI install of Windows Server |
| Julius      | Fileserver          | 10.2.X.2    | Windows Server 2012 R2  | SMB, FTP                | GUI install of Windows Server |
| Churchill   | Docker Host         | 10.2.X.3    | Ubuntu 16.04            | Docker API              | Running Mattermost, other containers (unscored) |
| Leonidas    | Graylog             | 10.2.X.4    | CentOS 7.6              | HTTP, Elasticsearch API | Also OSSEC controller |
| Attila      | Vulnerable Web App  | 10.2.X.5    | Cucumber Linux          | HTTP                    | LAMP stack for injects webapp |
| Xerxes      | Mail                | 10.2.X.6    | Windows Server 2008 R2  | SMTP (hMail)            | GUI install of Windows Server | 
| Ashoka      | VPN Endpoint        | 10.2.X.7    | Ubuntu 14.04            | OpenVPN                 ||
| Bismark     | Client              | DHCP        | Kali 2018.2             |                         ||
| Washington  | Router              | 10.2.X.254  | PAN                     |                         ||

### DMZ Network
Blueteam-managed network  
No console access provided  
Network: 10.3.X.0/24  
Gateway: 10.3.X.254  
Domain: teamX.cybertigers.club  

| Hostname    | Role                | IP          | OS                      | Services                | Notes |
|-------------|---------------------|-------------|-------------------------|-------------------------|-------|
| Gandhi      | Public DNS          | 10.3.X.1    | FreeBSD 11.2            | DNS, HTTP (Webmin)      ||
| Bonaparte   | Public Website      | 10.3.X.2    | Windows Server 2012 R2  | HTTP, HTTPS (IIS)       | Core install of Windows Server |
| Ataturk     | GitLab              | 10.3.X.3    | CentOS 7.6              | HTTPS, SSH (git)        | GitLab login required for HTTPS check |
| Washington  | Router              | 10.3.X.254  | PAN                     |                         ||
