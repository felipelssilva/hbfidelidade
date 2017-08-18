CREATE TABLE client (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
dtReg TIMESTAMP,
fName VARCHAR(30) NOT NULL,
lName VARCHAR(30) NOT NULL,
cpf INT(11) UNSIGNED NOT NULL,
email VARCHAR(50) NOT NULL,
passwd VARCHAR(30) NOT NULL,
address VARCHAR(50) NOT NULL,
district VARCHAR(30) NOT NULL,
city VARCHAR(30) NOT NULL,
state VARCHAR(30) NOT NULL,
phone1 INT(11) UNSIGNED NOT NULL,
phone2 INT(12) UNSIGNED NOT NULL
);


CREATE TABLE fidelity (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
dtReg TIMESTAMP,
clientID INT(6) UNSIGNED ,
orderID INT(6) UNSIGNED ,
pointing INT(6) UNSIGNED NULL
);



CREATE TABLE request (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
dtReg TIMESTAMP,
clientID INT(6) UNSIGNED ,
snackID INT(6) UNSIGNED ,
drinkID INT(6) UNSIGNED ,
closedOrder BOOLEAN DEFAULT 0 NOT NULL
);




CREATE TABLE drink (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
dtReg TIMESTAMP,
description VARCHAR(200),
type VARCHAR(200)
);


CREATE TABLE snack (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
dtReg TIMESTAMP,
description VARCHAR(200),
type VARCHAR(200)
);



CREATE TABLE closedOrder (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
dtReg TIMESTAMP,
clientID INT(6) UNSIGNED NOT NULL,
orderID INT(6) UNSIGNED NOT NULL
);

