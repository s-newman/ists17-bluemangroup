USE powerdns;

-- DMZ domain

-- Adding a new domain team{{ team_number }}.ists.io

INSERT INTO domains (name, type) values ('team{{ team_number }}.ists.io', 'NATIVE');

-- Adding records for the domain

-- SOA record

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team{{ team_number }}.ists.io'),'team{{ team_number }}.ists.io','localhost root.team{{ team_number }}.ists.io 1 10380 3600 604800 3600','SOA',86400,NULL);

-- NS records

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team{{ team_number }}.ists.io'),'team{{ team_number }}.ists.io','gandhi.team{{ team_number }}.ists.io','NS',86400,NULL);

-- A records

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team{{ team_number }}.ists.io'),'gandhi.team{{ team_number }}.cybertigers.clubb','10.{{ team_number }}.1.1','A',120,NULL);

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team{{ team_number }}.ists.io'),'bonaparte.team{{ team_number }}.ists.io','10.{{ team_number }}.1.2','A',120,NULL);

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team{{ team_number }}.ists.io'),'ataturk.team{{ team_number }}.ists.io','10.{{ team_number }}.1.3','A',120,NULL);

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team{{ team_number }}.ists.io'),'washington.team{{ team_number }}.ists.io','10.{{ team_number }}.1.254','A',120,NULL);

