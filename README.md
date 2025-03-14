# intervolga-task
Подготовка MySQL для 3-го задания:

CREATE DATABASE IF NOT EXISTS testdb;

USE testdb;

CREATE TABLE IF NOT EXISTS comments (
	id int PRIMARY KEY AUTO_INCREMENT,
	COMMENT TEXT NOT NULL
);

CREATE user IF NOT EXISTS test_user IDENTIFIED by '12345';
GRANT ALL ON testdb.comments TO test_user;
