-- Database creation
CREATE DATABASE IF NOT EXISTS `agencydb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Switch to the created database
USE `agencydb`;

-- Create Client table
CREATE TABLE IF NOT EXISTS `Client` (
  `ClientID` INT AUTO_INCREMENT PRIMARY KEY,
  `ClientName` VARCHAR(50),
  `ClientSurname` VARCHAR(50),
  `Username` VARCHAR(50) UNIQUE,
  `Email` VARCHAR(100),
  `Gender` ENUM('Male', 'Female', 'Other'),
  `Phone` VARCHAR(20),
  `Password` VARCHAR(255),
  `Type` VARCHAR(50),
  `Reviews` TEXT
  `ProfileImage` VARCHAR(255),
  `Spending` INT,
  `Rating`  INT


);

-- Create Country table
CREATE TABLE IF NOT EXISTS `Country` (
  `CountryID` INT AUTO_INCREMENT PRIMARY KEY,
  `CountryName` VARCHAR(100),
  `CountryInfo` TEXT,
  `CountryImage` VARCHAR(255)
);

-- Create Destination table
CREATE TABLE IF NOT EXISTS `Destination` (
  `DestinationID` INT AUTO_INCREMENT PRIMARY KEY,
  `DestinationName` VARCHAR(100),
  `DestinationInfo` TEXT,
  `DestinationImage` VARCHAR(255),
  `DestinationPrice` DECIMAL(10, 2),
  `StartDate` DATE,
  `EndDate` DATE,
  `Type` ENUM('Adventure', 'Relaxation', 'Historical', 'Cultural', 'Other'),
  `Revenue` DECIMAL(10, 2),
  `CountryID` INT,
  FOREIGN KEY (`CountryID`) REFERENCES `Country`(`CountryID`)
);

-- Create Booking table
CREATE TABLE IF NOT EXISTS `Booking` (
  `BookingID` INT AUTO_INCREMENT PRIMARY KEY,
  `ClientSpendings` DECIMAL(10, 2),
  `Reviews` TEXT,
  `ClientID` INT,
  `DestinationID` INT,
  FOREIGN KEY (`ClientID`) REFERENCES `Client`(`ClientID`),
  FOREIGN KEY (`DestinationID`) REFERENCES `Destination`(`DestinationID`)
);
