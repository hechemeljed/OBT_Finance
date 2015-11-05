<!DOCTYPE HTML>


<html>
	<head>
		<title>Affichage | Emprunt OBL</title>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		
		<!-- prefix free to deal with vendor prefixes -->
		<script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js"></script>

		<!-- jQuery -->
		<script src="http://thecodeplayer.com/uploads/js/jquery-1.7.1.min.js"></script>
		<script  src="js/script1.js"></script>	
         
       <!-- <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>-->
        <script src="js/jquery.bootstrap-growl.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
            <link type="text/css" href="css/jquery.toastmessage-min.css" rel="stylesheet"/>
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
        <script type="text/javascript"> 
function imprimer(){
document.getElementById("print").style.visibility="hidden";
window.print();
document.getElementById("print").style.visibility="visible";
} 

</script> 
	</head>
	<body class="left-sidebar">
    <?php
session_start();
?>
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	echo '<ul style="padding:0; color:red;">';
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<li>',$msg,'</li>'; 
	}
	echo '</ul>';
	unset($_SESSION['ERRMSG_ARR']);
}
?>
		 <!-- Header -->
        <div id="header">

            <!-- Inner -->
      <div class="inner">
                <header>
                    <h1>Affichage | Emprunt OBL</h1>
                </header>
            </div>
        </div>

			
		<!-- Main -->
			
			<div class="wrapper style2">
				<div class="container">
					<div class="row">
						<div class="4u" id="sidebar">
							<section>
								<div class="byline"><a href="index.php#start">Accueil</a>
                             </div>
							</section>
						</div>

						<div class="8u skel-cell-mainContent" id="content">
							<!--<form action='save.php' method='post' target="_blank">-->
								<article id="main">
									
										<h2>
										</h2>
									<br>	
                                    						
									 <table width="50%" >
  <thead>
    <th scope="col" align="left"><b>Libellés de l'emprunt</b></th>
    <th scope="col" align="left"><b>Code ISIN</b></th>
    <th scope="col" align="left"><b>Action</b></th>
  </thead>
  <tbody>
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
		
		if (isset($_GET["page"])) { $page  = $_GET["page"];} else { $page=1; };
		$start_from = ($page-1) * 6; 		
		$result = $db->prepare("SELECT * FROM emprunt LIMIT $start_from, 6");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
  <tr>
    <td><?php echo $row['libelleEmp']; ?></td>
    <td><?php echo $row['codeISIN']; ?></td>
    <td><a href="aff.php?id=<?php echo $row['id']; ?>" target="_blank"><img src="images/PNG-24/Info.png"></a><a href="update.php?id=<?php echo $row['id']; ?>"><img src="images/PNG-24/Modify.png"></a><a href="delete.php?id=<?php echo $row['id']; ?>"><img src="images/PNG-24/Delete.png"></a><?php 
	$f = fopen("result.doc","a+") ;
								fwrite($f,"		Emprunt OBL n°".$row['id']." \n <table><tr><td><font color=red>libelleEmp :</font></td><td>".$row['libelleEmp']."</font></td></tr><tr><td><font color=red> emetteur :</font></td><td> ".$row['emetteur']." </td></tr><tr><td><font color=red> inter. charge :</font></td><td> ".$row['inter']." </td></tr><tr><td><font color=red> codeISIN :</font></td><td> ".$row['codeISIN']." </td></tr><tr><td><font color=red> mnemonique :</font></td><td> ".$row['mnemonique']." </td></tr><tr><td><font color=red> libelle :</font></td><td> ".$row['libelle']." </td></tr><tr><td><font color=red> tauxInteret :</font></td><td> ".$row['tauxInteret']." </td></tr><tr><td><font color=red> duree :</font></td><td> ".$row['duree']." </td></tr><tr><td><font color=red> nominal :</font></td><td> ".$row['nominal']." </td></tr><tr><td><font color=red> modeAmmort :</font></td><td> ".$row['modeAmmort']." </td></tr><tr><td><font color=red> nbObligations :</font></td><td> ".$row['nbObligations']." </td></tr><tr><td><font color=red> montant :</font></td><td> ".$row['modeAmmort']." </td></tr><tr><td><font color=red> dateJouissance :</font></td><td> ".$row['dateJouissance']." </td></tr><tr><td><font color=red> datePremEcheance :</font></td><td> ".$row['modeAmmort']." </td></tr><tr><td><font color=red> dateDerEcheance :</font></td><td> ".$row['dateDerEcheance']." </td></tr> </table> <br> \n" );     
										
								fclose($f);
	
	?><a href="result.doc"><img src="images/PNG-24/Save.png"></a><a onClick="imprimer()" id="print"><img src="images/PNG-24/Print.png"></a>
    </td>
  </tr>
<?php
		}
	?>
  </tbody>
</table>
										
                                    
							  </article>
						<!--	</form>-->
						</div>
					</div>		
				</div>
			</div>
		
	</body>
</html>