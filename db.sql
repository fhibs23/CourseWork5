DROP DATABASE IF EXISTS appdb;
CREATE DATABASE appdb;
USE appdb;

DROP TABLE IF EXISTS category;


DROP TABLE IF EXISTS workers;
CREATE TABLE workers (
  id INT NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  unit varchar(255) NOT NULL ,
  position varchar(255) NOT NULL ,
  date_of_employment date NOT NULL,
  date_of_birth date NOT NULL ,
  salary INT NOT NULL ,
  CONSTRAINT pk_id PRIMARY KEY (id)
);

INSERT INTO workers(name, unit, position, date_of_employment,date_of_birth,salary)
VALUES ('Антонов В.Ф.', 'отдел продаж', 'менеджер', '2013-09-12','1990-02-25',56000),
       ('Белякова А.Л', 'HR', 'руководитель отдела кадров', '2014-12-03','1992-05-04', 65000),
       ('Дроздов Г.Р', 'бухгалтерия', 'ведущий инженер-программист', '2012-03-11','1989-08-30',98000),
       ('Захаров П.В.', 'отдел мобильной разработки', 'инженер-программист', '2015-11-11','1987-04-23', 89000),
       ('Ковалев А.А.', 'отдел PR и маркетинга', 'ведущий инженер-программист','2009-03-05','1983-12-12', 105000),
       ('Третьякова В.Л.', 'администрация', 'генеральный директор', '2012-03-11','1978-03-09',150000),
       ('Кабанов Е.Р', 'casebook', 'бизнес-аналитик',' 2014-12-03','1991-06-25',75000);

DROP TABLE IF EXISTS user;
CREATE TABLE user (
  id INT NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  telephone TEXT NOT NULL ,
  password varchar(255) NOT NULL,
  role varchar(50) NOT NULL DEFAULT 'user',
  CONSTRAINT PRIMARY KEY (id)
);


INSERT INTO user(name, email, telephone,password, role)
 VALUES ('Lena','khuraskina01@mail.ru','12345678','password','admin'),
        ('Green Anna','green@gmail.com','111111111111','111111','user'),
        ('Ac','sd@gmail.com','11113111','111111','user');





DROP TABLE IF EXISTS product_order;
