<?php 
require_once "connect.php";

//1ST STEP: create a table Languages

// sql create database
$sql = "CREATE DATABASE fedotov_task";
if ($link->query($sql) === TRUE) { //catch the errors 
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $link->error;
}

//select the created database
mysqli_select_db($link, "fedotov_task");
mysqli_query($link, "SET NAMES utf8");

// sql to create table
$sql = "CREATE TABLE Languages (
ID INT(11) AUTO_INCREMENT PRIMARY KEY,
Code TINYTEXT NOT NULL,
Title TEXT NOT NULL,
ListOrder TINYINT(11)
)";

//try to create table and catch the errors
if ($link->query($sql) === TRUE) {
  echo '<br>';
  echo "Table Languages was created successfully";
} else {
  echo '<br>';
  echo "Error creating table: " . $link->error;
}

//2ND STEP: create a file called langLib.php

//creating a file itself
$langLib = fopen("langLib.php", "w");

//creating a string with all the code
$langLibCode = "<?php 
/*Library which built different wiev of languages*/
require_once \"connect.php\"; //openin connection
mysqli_select_db($link, \"fedotov_task\"); //using our database
$availableLangs = mysqli_query($link, \"SELECT DISTINCT Code FROM Languages\"); //getting the languages

function interactiveListLong()
{
	while($ln = mysqli_fetch_assoc($availableLangs))
	{
		echo '<a href=\"?ln='.$ln['Code'].'\"<li>'.$ln['Title'].'</li></a>';
	}
}

function interactiveListShort()
{
	while($ln = mysqli_fetch_assoc($availableLangs))
	{
		echo '<a href=\"?ln='.$ln['Code'].'\"<li>'.$ln['Code'].'</li></a>';
	}
}

function dropDownList()
{
	echo '<select name=\"Languages\">';
	while($ln = mysqli_fetch_assoc($availableLangs))
	{
		echo '<option value=\"'.$ln['Code'].'\">';
	}
	echo '</select>';
}

";


?>