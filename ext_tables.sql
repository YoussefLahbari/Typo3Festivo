CREATE TABLE tx_festivo_domain_model_tag (
    uid int(11) NOT NULL auto_increment,
    title varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid),
); 
CREATE TABLE tx_festivo_domain_model_location (
    uid int(11) NOT NULL auto_increment,
    title varchar(255) DEFAULT '' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid),
); 
CREATE TABLE tx_festivo_domain_model_event (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    archived tinyint(1) DEFAULT '0' NOT NULL,
    title varchar(255) DEFAULT '' NOT NULL,
    subtitle text DEFAULT '' NOT NULL,
    event_date datetime DEFAULT NULL,
    event_price varchar(255) DEFAULT '' NOT NULL,
    tag int(11) DEFAULT '0' NOT NULL,
    location int(11) DEFAULT '0' NOT NULL,
    media varchar(256) DEFAULT '' NOT NULL,
    sorting int(11) DEFAULT '0' NOT NULL,
    tstamp int(11) DEFAULT '0' NOT NULL,
    crdate int(11) DEFAULT '0' NOT NULL,
    cruser_id int(11) DEFAULT '0' NOT NULL,
    deleted tinyint(1) DEFAULT '0' NOT NULL,
    hidden tinyint(1) DEFAULT '0' NOT NULL,
    PRIMARY KEY (uid),
);