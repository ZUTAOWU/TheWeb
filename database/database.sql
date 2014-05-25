DROP DATABASE IF EXISTS n8975698;
CREATE DATABASE n8975698;

USE WEB;

CREATE TABLE Members 
(
	ID       VARCHAR(255) NOT NULL,
	USERNAME VARCHAR(255) NOT NULL,
	EMAIL    VARCHAR(255) NOT NULL,
	PASSWORD VARCHAR(255) NOT NULL,
	SEX		 INT,
	PRIMARY KEY (ID)
);

CREATE TABLE Items
(
	ID        VARCHAR(255) NOT NULL,
	NAME      VARCHAR(255),
	ADDRESS   VARCHAR(255),
	SUBURB    VARCHAR(255),
	Latitude  DOUBLE,
	Longitude DOUBLE,
	PRIMARY KEY (ID)
);

CREATE TABLE Reviews
(
	ID       VARCHAR(255) NOT NULL,
	USERID   VARCHAR(255) NOT NULL,
	ITEMID   VARCHAR(255) NOT NULL,
	CONTENT  VARCHAR(255) NOT NULL,
	RATE     INT NOT NULL,
	POSTDATE TIMESTAMP NOT NULL,
	PRIMARY KEY (ID),
	FOREIGN KEY (USERID) REFERENCES Members(ID),
	FOREIGN KEY (ITEMID) REFERENCES Items(ID)
);

INSERT INTO Members VALUES ("1","admin","","admin",1);
INSERT INTO Members VALUES ("2","Tony","vvilp@163.com","tony",1);
