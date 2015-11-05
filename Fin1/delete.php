<?php
			/* Database config */
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'finance'; 
	/* End config */
try {
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?><script language="javascript"> $.bootstrapGrowl("Connected to MySQL !",{ type: 'success' })</script><?php
}
catch(Exception $e){
	  echo "Connection à MySQL impossible : ", $e->getMessage();
  die();
  ?><script language="javascript"> $.bootstrapGrowl("Connection à MySQL impossible !")</script><?php
	}
	
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM obl WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: read.php");
?>