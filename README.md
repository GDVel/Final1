# Final1
Forgot to do several commits.
imported data direct to mysql
mysql -u root -p --local-infile

created db named project
created tables colleges, enrollment, financial, standing, and status

CREATE TABLE institution (
    id INT(6) UNSIGNED PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    address VARCHAR(100) NOT NULL,
    city VARCHAR(30) NOT NULL,
    state CHAR(2) NOT NULL,
    zip VARCHAR(10) NOT NULL,
    region CHAR(2) NOT NULL,
    website VARCHAR(150)
);


LOAD DATA LOCAL INFILE 'temp/hd2013.csv' INTO TABLE institution FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE 'temp/ef2013a.csv' INTO TABLE institution FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE 'temp/f1213_fla.csv' INTO TABLE institution FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;
