CREATE DATABASE pcs_practice;
USE pcs_practice;

CREATE TABLE users (
    id int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    login char(50) NOT NULL,
    firstname char(50) NOT NULL,
    lastname char(50) NOT NULL,
    pass char(50) NOT NULL,
    active tinyint(1)
);

CREATE TABLE dct_country (
    id int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    code char(2),
    name char(50)
);

INSERT INTO dct_country (code, name)
VALUES
    ('RU', 'Russia'),
    ('US', 'United States'),
    ('EG', 'Egypt'),
    ('FR', 'France');

CREATE TABLE dct_cars (
    id int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name char(50)
);

INSERT INTO dct_cars (name)
VALUES
    ('Volvo'),
    ('BMW'),
    ('Mercedes'),
    ('Ford');

CREATE TABLE applications (
    id int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname char(50),
    lastname char(50),
    phone_number char(50) NOT NULL,
    country_id int(16),
    car_id int(16),
    color char(10),
    downpayment decimal(10),
    insurance tinyint(1),
    delivery_date date,
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);