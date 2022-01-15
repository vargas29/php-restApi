CREATE DATABASE IF NOT EXISTS blankfactor;

USE blankfactor;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100)  NOT NULL,
  `last_name` varchar(100) NULL,
  `email` varchar(250)  NOT NULL,
  `password` varchar(250)  NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
);

INSERT INTO `users`
  (`name`,`lastname`,`email`,`password`)
Values
('Mario','ancho','mario@gmail.com','qwer123')
,('Ana','Berrio','berrio@gmail.com','berrio24')
,('Mario','ancho','mario@gmail.com','qwer123')
,('Natio','paseo','yuuwi@gmail.com','123knkd')
,('Natalia','Sanchez','yuuwnadai@gmail.com','natasan45')
,('Santiago','Giraldo','green@gmail,com','qwet1234')
,('Olga','gttt',,'ogaert@gmail,com','qwetolgaguitierre1234')
,('Pablo','Foria','Doria@gmail.com','pablo90');


