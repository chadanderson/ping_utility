/* Import this file to create the database and table */

drop database if exists pu_network_db;
create database pu_network_db;

use pu_network_db;

drop table if exists devices;

create table devices (
	ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	ip_address VARCHAR(20) NOT NULL,
	type VARCHAR(20) NOT NULL,
	location VARCHAR(20) NOT NULL,
	date_added DATETIME NOT NULL,
	PRIMARY KEY (ID)
) COLLATE utf8_general_ci;

