# bluemangroup

Blue Man Group is the codename for the Blue Team infrastructure component of ISTS17.

## Network Topology
![ISTS 17 topology](network.png)

## Host Reference
Notes about "global" services:
- Ping on all hosts
- WinRM on all Windows hosts
- SSH on all Linux/Unix hosts

### Internal Network
Blueteam-managed network  
Console access provided  
Network: 10.X.0.0/24  
Gateway: 10.X.0.254  
Domain: teamX.ists.io  

| Hostname    | Role                | IP          | OS                      | Services                | Notes |
|-------------|---------------------|-------------|-------------------------|-------------------------|-------|
| Alexander   | Domain Controller   | 10.X.0.1    | Windows Server 2016     | LDAP, DNS               ||
| Julius      | Fileserver          | 10.X.0.2    | Windows Server 2012 R2  | SMB, FTP                | Roaming user profile host |
| Churchill   | Docker Host         | 10.X.0.3    | Ubuntu 18.04            | Docker API              | Running Mattermost, other containers (unscored) |
| Leonidas    | Graylog             | 10.X.0.4    | CentOS 7                | HTTP, Elasticsearch API | Also OSSEC controller |
| Attila      | Vulnerable Web App  | 10.X.0.5    | Cucumber Linux          | HTTP                    | LAMP stack for injects webapp |
| Xerxes      | Mail                | 10.X.0.6    | Windows Server 2008 R2  | SMTP (hMail)            | Not used for inject delivery |
| Ashoka      | VPN Endpoint        | 10.X.0.7    | Ubuntu 14.04            | OpenVPN                 | Uses 10.X.2.0/24 for VPN clients |
| Washington  | Router              | 10.X.0.254  | PAN                     |                         ||

### DMZ Network
Blueteam-managed network  
No console access provided  
Network: 10.X.1.0/24  
Gateway: 10.X.1.254  
Domain: teamX.TBD  

| Hostname    | Role                | IP          | OS                      | Services                | Notes |
|-------------|---------------------|-------------|-------------------------|-------------------------|-------|
| Gandhi      | Public DNS          | 10.X.1.1    | FreeBSD 11.2            | DNS, HTTP (Webmin)      ||
| Bonaparte   | Public Website      | 10.X.1.2    | Windows Server 2012 R2  | HTTP, HTTPS (IIS)       | Core install |
| Ataturk     | GitLab              | 10.X.1.3    | openSUSE 42.3           | HTTPS, SSH (git)        | GitLab login required for HTTPS check |
| Washington  | Router              | 10.X.1.254  | PAN                     |                         ||

### VPN Network
Whiteteam-managed network  
Console access provided  
Network: TBD  
Domain: none  

| Hostname    | Role                | IP          | OS                      | Services                | Notes |
|-------------|---------------------|-------------|-------------------------|-------------------------|-------|
| Bismark     | Client              | DHCP        | Kali 2018.2             |                         ||
| Suleyman    | Client              | DHCP        | Windows 8               |                         ||
