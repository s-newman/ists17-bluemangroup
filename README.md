# bluemangroup

Blue Man Group is the codename for the Blue Team infrastructure component of ISTS17.

## Subnets
// TODO: prettyfy  
_**Note that the internal and DMZ networks are /25, not /24**_

### Internal
Managed by blue teamers  
Supposed to be less public, "trusted"  
Network: 10.X.0.0/25  
Router: 10.X.0.126

### DMZ
Managed by blue teamers  
Supposed to be more public  
Network: 10.X.0.128/25  
Router: 10.X.0.254

### Remote
Unmanaged by blue teamers 
DHCP