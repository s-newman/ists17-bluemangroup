USE powerdns;

-- DMZ domain

-- Adding a new domain team1.ists.io

INSERT INTO domains (name, type) values ('team1.ists.io', 'NATIVE');

-- Adding records for the domain

-- SOA record

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team1.ists.io'),'team1.ists.io','localhost root.team1.ists.io 1 10380 3600 604800 3600','SOA',86400,NULL);

-- NS records

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team1.ists.io'),'team1.ists.io','gandhi.team1.ists.io','NS',86400,NULL);

-- A records

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team1.ists.io'),'gandhi.team1.cybertigers.clubb','10.1.1.1','A',120,NULL);

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team1.ists.io'),'bonaparte.team1.ists.io','10.1.1.2','A',120,NULL);

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team1.ists.io'),'ataturk.team1.ists.io','10.1.1.3','A',120,NULL);

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team1.ists.io'),'washington.team1.ists.io','10.1.1.254','A',120,NULL);

