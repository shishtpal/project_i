<?php 

date_default_timezone_set('UTC');

$databaseName = "projecti";
// create database if not exists
// IF NOT EXISTS CREATE DATABASE `projecti`;


// create tables if not exists for USERS
$userSchema =<<<"EOT"
CREATE TABLE IF NOT EXISTS `identity` ( `Id` INT(50) UNIQUE AUTO_INCREMENT ,  `Full_name` VARCHAR(250) NOT NULL ,  `Email` VARCHAR(250) NOT NULL UNIQUE,  `MobileNo` VARCHAR(250) NOT NULL ,  `Password` VARCHAR(250) NOT NULL ,  `isRoot` INT(50) NOT NULL ,  `isActive` INT(50) NOT NULL ,  `whichGroup` VARCHAR(250) NOT NULL ,  `whoIam` VARCHAR(250) NOT NULL ,  `status` INT(50) NOT NULL ,  `createdAt` VARCHAR(250) NOT NULL , PRIMARY KEY( `Id`))
EOT;

$loginhistorySchema =<<<"EOT"
CREATE TABLE IF NOT EXISTS `loginHistory` ( `loginid` INT NOT NULL AUTO_INCREMENT ,  `userid` INT NOT NULL ,  `email` VARCHAR(250) NOT NULL ,  `whichGroup` VARCHAR(250) NOT NULL ,  `timeAtLogin` VARCHAR(250) NOT NULL ,  `timeAtLogout` VARCHAR(250) NOT NULL ,    PRIMARY KEY  (`loginid`) )
EOT;

// create table if not exists for Notes
$noteSchema =<<<"EOT"
CREATE TABLE IF NOT EXISTS `notes` ( `noteid` INT(50) UNIQUE AUTO_INCREMENT ,  `userid` INT(50) NOT NULL ,  `noteTitle` VARCHAR(250) NOT NULL ,  `noteContent` TEXT NOT NULL , `tags` VARCHAR(250) NOT NULL ,  `score` INT NOT NULL ,  `isCompleted` INT NOT NULL ,  `isPublic` INT NOT NULL ,  `createdAt` VARCHAR(250) NOT NULL ,  `modifiedAt` VARCHAR(250) NOT NULL ,    PRIMARY KEY  (`noteid`) )
EOT;

// noteHistory schema
$noteHistorySchema =<<<"EOT"
CREATE TABLE IF NOT EXISTS `noteHistory` ( `noteHid` INT(50) NOT NULL AUTO_INCREMENT ,  `userid` INT(50) NOT NULL ,  `noteParentId` INT(50) NOT NULL ,  `noteTitle` VARCHAR(250) NOT NULL ,  `noteContent` TEXT NOT NULL ,  `tags` VARCHAR(250) NOT NULL ,  `isPublic` INT NOT NULL ,  `when` VARCHAR(250) NOT NULL ,    PRIMARY KEY  (`noteHid`) )
EOT;

// grap a MySQLi Object from this Connection
$db = new mysqli("localhost", "root", "", $databaseName, 3306);

if (!$db->connect_errno) {
	// logic starts from here
	$db->query($userSchema);
	$db->query($loginhistorySchema);
	$db->query($noteSchema);
	$db->query($noteHistorySchema);
	// echo $db->connect_errno;
} else {
	echo "Failed to connect to database.";
}






?>