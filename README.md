# Final1
Forgot to do several commits.
imported data direct to mysql
mysql -u root -p --local-infile

created db named project
created tables colleges, enrollment, financial, standing, and status

CREATE TABLE college (
    id INT(6) UNSIGNED PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    address VARCHAR(100) NOT NULL,
    city VARCHAR(30) NOT NULL,
    state CHAR(2) NOT NULL,
    zip VARCHAR(10) NOT NULL,
    region CHAR(2) NOT NULL,
    website VARCHAR(150)
);

CREATE TABLE enrollment (
    id INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    college_id INT(6) UNSIGNED,
    status INT(6) UNSIGNED,
    section INT(6) UNSIGNED,
    standing INT(6) UNSIGNED,
    ment INT(6) NOT NULL,
    womentINT(6) NOT NULL,
    total INT(6) NOT NULL
);


table time = Full time, part time, all students
table standing includes undergraduate, graduate, all students

LOAD DATA LOCAL INFILE ‘projects/hd2013.csv' INTO TABLE institution FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE ‘projects/ef2013a.csv' INTO TABLE institution FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (college_id, status, time, standing, mentotal, womentotal, total);


LOAD DATA LOCAL INFILE ‘projects/f1213_fla.csv' INTO TABLE institution FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (college_id, currassets, totalassets, currliab, tuition, endowment );





