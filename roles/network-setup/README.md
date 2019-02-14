Network Setup
=========

This role is responsible for using the fact {{ inventory_hostname }} and the dictionary 'machines' defined in /group_vars/all.yml to assign static ip addresses to machines, and to configure their DNS settings.

How it works
------------

This role depends on a few things for it to successfully deploy a competition environment.

The Virtual Machines must be set up to use DHCP, and must be configured to send their hostname along with the DHCP request (Not default in CentOS).
They should point at a DHCP server, which can register them into DNS. The DHCP scope is determined by the network that the virtual machine is in.
The next step is to make the ansible server resolve DNS from the DHCP/DNS server that has the records.
We now use FQDNs in the inventory hosts file, which will be resolvable. We also precompute a dictionary "machines" of what we'd like the end ip addresses / settings etc. to be. A script to do that has been provided 'generate_machines.sh'.
Now using the inventory_hostname ansible fact, and the machines dictionary, we are able to adequately deploy team specific applications to machines.
Please note that the last command will restart networking. Ansible has been configured to "Fire and Forget" this command.
After a successful run of this role, all servers affected will have their IP changed. This means you'll either need to point at a DNS server with proper records, or configure your /etc/hosts file to resolve them for you.

Requirements
------------

Dictionary in /group_vars/all.yml that is called 'machines'. 'machines' will map fqdn's to a dictionary containing an ip address and a team identifier.
i.e.

{ machines: {
    vm1.testing.ists: { 
      ip: "127.0.0.1",
      team_id: 0
    }
}

Role Variables
--------------
'machines' in /group_vars/all.yml
  Maps an FQDN to a team identifier and ip address

'hostnames' in /group_vars/all.yml
  Maps a machines' role to its hostname (i.e. AD --> sol)

'whiteteam_nameservers' in /group_vars/all.yml
  An optional list of nameservers to include

'whiteteam_hosts' in /group_vars/all.yml
  An optional dictionary of /etc/hosts definitions
  i.e.
  {'whiteteam_hosts': {'ip': 'hostname'}}

Dependencies
------------
The resolv.conf template will assign the default nameserver to the 'ad' host (defined in hostnames) by default.

Example Playbook
----------------

It is recommended to run this as the first role in deploy.yml

    - hosts: all
      roles:
         - network-setup

License
-------

Apache 2.0

Author Information
------------------

Kyle Carretto
