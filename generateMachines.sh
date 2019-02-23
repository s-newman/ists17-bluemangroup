echo "machines:"
for i in $(seq 0 13); do echo -e "
  alexander.team$i.ists.io:
    hostname: \"alexander\"
    team_id: \"$i\"
    ip: \"10.2.$i.1\"
    network: \"10.2.$i.0\"
    netmask: \"255.255.255.0\"
    gateway: \"10.2.$i.254\"
    broadcast: \"10.2.$i.255\"
  julius.team$i.ists.io:
    hostname: \"julius\"
    team_id: \"$i\"
    ip: \"10.2.$i.2\"
    network: \"10.2.$i.0\"
    netmask: \"255.255.255.0\"
    gateway: \"10.2.$i.254\"
    broadcast: \"10.2.$i.255\"
  churchill.team$i.ists.io:
    hostname: \"churchill\"
    team_id: \"$i\"
    ip: \"10.2.$i.3\"
    network: \"10.2.$i.0\"
    netmask: \"255.255.255.0\"
    gateway: \"10.2.$i.254\"
    broadcast: \"10.2.$i.255\"
  leonidas.team$i.ists.io:
    hostname: \"leonidas\"
    team_id: \"$i\"
    ip: \"10.2.$i.4\"
    network: \"10.2.$i.0\"
    netmask: \"255.255.255.0\"
    gateway: \"10.2.$i.254\"
    broadcast: \"10.2.$i.255\"
  attila.team$i.ists.io:
    hostname: \"attila\"
    team_id: \"$i\"
    ip: \"10.2.$i.5\"
    network: \"10.2.$i.0\"
    netmask: \"255.255.255.0\"
    gateway: \"10.2.$i.254\"
    broadcast: \"10.2.$i.255\"
  xerxes.team$i.ists.io:
    hostname: \"xerxes\"
    team_id: \"$i\"
    ip: \"10.2.$i.6\"
    network: \"10.2.$i.0\"
    netmask: \"255.255.255.0\"
    gateway: \"10.2.$i.254\"
    broadcast: \"10.2.$i.255\"
  ashoka.team$i.ists.io:
    hostname: \"ashoka\"
    team_id: \"$i\"
    ip: \"10.2.$i.7\"
    network: \"10.2.$i.0\"
    netmask: \"255.255.255.0\"
    gateway: \"10.2.$i.254\"
    broadcast: \"10.2.$i.255\"
  washington.team$i.ists.io:
    hostname: \"washington\"
    team_id: \"$i\"
    ip: \"10.2.$i.254\"
    network: \"10.2.$i.0\"
    netmask: \"255.255.255.0\"
    gateway: \"10.2.$i.254\"
    broadcast: \"10.2.$i.255\"
  gandhi.team$i.cybertigers.club:
    hostname: \"gandhi\"
    team_id: \"$i\"
    ip: \"10.3.$i.1\"
    network: \"10.3.$i.0\"
    netmask: \"255.255.255.0\"
    gateway: \"10.3.$i.254\"
    broadcast: \"10.3.$i.255\"
  bonaparte.team$i.cybertigers.club:
    hostname: \"bonaparte\"
    team_id: \"$i\"
    ip: \"10.3.$i.2\"
    network: \"10.3.$i.0\"
    netmask: \"255.255.255.0\"
    gateway: \"10.3.$i.254\"
    broadcast: \"10.3.$i.255\"  
  ataturk.team$i.cybertigers.club:
    hostname: \"ataturk\"
    team_id: \"$i\"
    ip: \"10.3.$i.3\"
    network: \"10.3.$i.0\"
    netmask: \"255.255.255.0\"
    gateway: \"10.3.$i.254\"
    broadcast: \"10.3.$i.255\"   
  
\n"; done

echo -e "
hostnames:
  mail: xerxes
  web: attila
  graylog: leonidas
  ad: alexander
  ftp: julius
  docker: churchill
  vpn: ashoka
  router: washington\n"
