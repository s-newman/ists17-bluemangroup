## Create your own branch for each box
```
git clone git@gitlab.ritsec.club:ists/17/bluemangroup.git
cd blueman group
git checkout -b <box_name>
```

## Intitialize a new role for each service you're configuring
```
ansible-galaxy init --init-path=roles/ <box_name>-<service>-deploy 
```

