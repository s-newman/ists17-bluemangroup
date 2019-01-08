USE powerdns;

-- DMZ domain

-- Adding a new domain team1.ists

INSERT INTO domains (name, type) values ('team1.ists', 'NATIVE');

-- Adding records for the domain

-- SOA record

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team1.ists'),'team1.ists','localhost root.team1.ists 1 10380 3600 604800 3600','SOA',86400,NULL);

-- NS records

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team1.ists'),'team1.ists','gandhi.team1.ists','NS',86400,NULL);

-- A records

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team1.ists'),'gandhi.team1.ists','10.1.1.1','A',120,NULL);

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team1.ists'),'bonaparte.team1.ists','10.1.1.2','A',120,NULL);

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team1.ists'),'ataturk.team1.ists','10.1.1.3','A',120,NULL);

INSERT INTO records (domain_id, name, content, type,ttl,prio)
VALUES ((SELECT id FROM domains WHERE name = 'team1.ists'),'washington.team1.ists','10.1.1.254','A',120,NULL);

