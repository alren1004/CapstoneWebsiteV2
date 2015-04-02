DROP DATABASE IF EXISTS CAPSTONE;

CREATE DATABASE CAPSTONE;

USE CAPSTONE;

CREATE TABLE users (
  user_id     INT(25)      NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_name   VARCHAR(70)  NOT NULL,
  password    VARCHAR(255) NOT NULL,
  user_email  VARCHAR(255) NOT NULL,
  is_verified BOOLEAN      NOT NULL DEFAULT FALSE,
  is_alumni   BOOLEAN      NOT NULL DEFAULT FALSE
);

CREATE TABLE profiles (
  profile_id INT(25)     NOT NULL AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(70) NOT NULL,
  last_name  VARCHAR(70) NOT NULL,
  background VARCHAR(255),
  education  VARCHAR(255),
  skills     VARCHAR(255),
  role       VARCHAR(50) NOT NULL,
  user_id    INT(25)     NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (user_id)
);

CREATE TABLE mentors (
  mentor_id            INT(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  profile_id           INT(25) NOT NULL,
  mentorship_desc      VARCHAR(255),
  years_of_experiences INT(3),
  fieldsSelect         VARCHAR(255),
  startDate            DATE,
  endDate              DATE,
  FOREIGN KEY (profile_id) REFERENCES profiles (profile_id)

);
