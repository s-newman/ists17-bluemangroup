USE powerdns;

-- DMZ domain

-- Adding a new domain team{{ team_number }}.cybertigers.club

INSERT INTO domains (name, type) values ('team{{ team_number }}.cybertigers.club', 'NATIVE');

-- Adding records for the domain

-- SOA record

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team{{ team_number }}.cybertigers.club'),'team{{ team_number }}.cybertigers.club','localhost root.team{{ team_number }}.cybertigers.club 1 10380 3600 604800 3600','SOA',86400,NULL);

-- NS records

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team{{ team_number }}.cybertigers.club'),'team{{ team_number }}.cybertigers.club','gandhi.team{{ team_number }}.cybertigers.club','NS',86400,NULL);

-- A records

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team{{ team_number }}.cybertigers.club'),'gandhi.team{{ team_number }}.cybertigers.club','10.{{ team_number }}.1.1','A',120,NULL);

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team{{ team_number }}.cybertigers.club'),'bonaparte.team{{ team_number }}.cybertigers.club','10.{{ team_number }}.1.2','A',120,NULL);

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team{{ team_number }}.cybertigers.club'),'ataturk.team{{ team_number }}.cybertigers.club','10.{{ team_number }}.1.3','A',120,NULL);

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team{{ team_number }}.cybertigers.club'),'washington.team{{ team_number }}.cybertigers.club','10.{{ team_number }}.1.254','A',120,NULL);

