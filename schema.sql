 -- MySQL dump 10.11
--
-- to install this database, from a terminal, type:
-- mysql -u USERNAME -p -h SERVERNAME world < world.sql
--
-- Host: localhost    Database: dolphin_crm
-- ------------------------------------------------------
-- Server version   5.0.45-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE dolphin_crm;
USE dolphin_crm;

--
-- Table structure for table users
--

DROP TABLE IF EXISTS users;
CREATE TABLE users(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname varchar(20) NOT NULL,
    lastname varchar(20) NOT NULL,
    password varchar(8) NOT NULL,
    email varchar(35) NOT NULL,
    role varchar(10) NOT NULL,
    created_at datetime(6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1;

--
-- Table structure for table contacts
--

DROP TABLE IF EXISTS contacts;
CREATE TABLE contacts (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(4) NOT NULL,
    firstname varchar(20) NOT NULL,
    lastname varchar(20) NOT NULL,
    email varchar(35) NOT NULL,
    telephone varchar(15) NOT NULL,
    role varchar(10) NOT NULL,
    company varchar(35) NOT NULL,
    type varchar(10) NOT NULL,
    assigned_to int(11) NOT NULL,
    created_by int(11) NOT NULL,
    created_at datetime(6) NOT NULL,
    updated_at datetime(6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=0;

--
-- Table structure for table notes
--

DROP TABLE IF EXISTS notes;
CREATE TABLE notes (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    contact_id int(11) NOT NULL,
    comment varchar(20) NOT NULL,
    password varchar(8) NOT NULL,
    email varchar(35) NOT NULL,
    role varchar(10) NOT NULL,
    created_at datetime(6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=0;