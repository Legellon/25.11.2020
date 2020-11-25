<?php
/*Library which built different wiev of languages*/
require_once "connect.php"; //openin connection
mysqli_select_db($link, "db_25_11_2020"); //using our database
$availableLangs = mysqli_query($link, "SELECT DISTINCT Code FROM Languages"); //getting the languages

function interactiveListLong()
{
	while($ln = mysqli_fetch_assoc($availableLangs))
	{
		echo '<a href="?ln='.$ln['Code'].'"<li>'.$ln['Title'].'</li></a>';
	}
}

function interactiveListShort()
{
	while($ln = mysqli_fetch_assoc($availableLangs))
	{
		echo '<a href="?ln='.$ln['Code'].'"<li>'.$ln['Code'].'</li></a>';
	}
}

function dropDownList()
{
	echo '<select name="Languages">';
	while($ln = mysqli_fetch_assoc($availableLangs))
	{
		echo '<option value="'.$ln['Code'].'">';
	}
	echo '</select>';
}
