<?php
ob_start(); 
session_start();

$con = new PDO("mysql:dbname=quiz7_5bkq;host=mysql1.cs.clemson.edu", "quiz7_iwbs", "quiz7_pass");
  
$name = trim($_POST["name"]);	
$query = $con->prepare("Select * from skills where name like '%$name%'");
$query->execute();
if($query->rowCount()!=0){
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			$pronoun = "";
			if ($row["gender"]=="M")
			{	$pronoun = "his";
			} else{
				$pronoun = "her";
			}
			echo "We found ".$row["name"]." , ".$pronoun." programming skill is ".$row["skill"]."and ".$pronoun." research interest is".$row["research"];		} 
}else{
	echo "Sorry, we cannot find ".$name." in our database.";
}

?>