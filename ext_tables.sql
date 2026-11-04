CREATE TABLE tx_festivo_domain_model_tag (
    title varchar(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_festivo_domain_model_location (
    title varchar(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_festivo_domain_model_event (
    archived tinyint(1) DEFAULT '0' NOT NULL,
    title varchar(255) DEFAULT '' NOT NULL,
    subtitle text,
    event_date datetime DEFAULT NULL,
    event_price varchar(255) DEFAULT '' NOT NULL,
    tag int(11) unsigned DEFAULT '0' NOT NULL,
    location int(11) unsigned DEFAULT '0' NOT NULL,
    media int(11) unsigned DEFAULT '0' NOT NULL
);

CREATE TABLE tx_festivo_domain_model_event_tag_mm (
    uid_local int(11) unsigned DEFAULT '0' NOT NULL,
    uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    sorting int(11) unsigned DEFAULT '0' NOT NULL,
    sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);
