<!DOCTYPE HTML>


<html>
	<head>
		<title>Calcul MT | Emprunt OBL</title>
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
        <script type="text/javascript" src="js/ajouterEmprunt.js"></script>
		
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
	</head>
	<body class="left-sidebar">
 
		 <!-- Header -->
        <div id="header">

            <!-- Inner -->
      		<div class="inner">
                <header>
                    <h1>Calcul MT | Emprunt OBL</h1>
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
								<article id="main">
									<br>							 
<?php 
include 'DAO/ConnexionBD.php';
include 'DAO/GestionBD.php';
include 'DAO/EmpruntDAO.php';
include 'Metier/Emprunt.php';

		$isin =$_POST['isin'];
		$quantite =$_POST['quantite'];
		$cours =$_POST['cours'];
		$seance =$_POST['seance'];

		echo '<b>Code ISIN : <b>'.$isin.'<br>';
		$_Connexion=new ConnexionBD();
        $_Connexion->connect();
        $_GestionBD = new GestionBD($_Connexion);
		$_empruntDAO=new EmpruntDAO($_GestionBD);
		$_emprunt = new Emprunt("","","","","","","","","","","","","","","");
		$_emprunt = $_empruntDAO->LoadByIsin($isin);
		//echo $_emprunt->__toString();
		
// Calcul MT
$nominal= $_emprunt->get_nominal();
echo '<b>Nominal : </b>'.$nominal.'<br>';
$duree=$_emprunt->get_duree();
echo '<b>Durée : <b>'.$duree.' ans <br>';
$amortissment = $nominal / $duree;
echo '<b>Amortissment : </b>'.$amortissment.'<br>';	
echo '<b>Date Séance : </b>'.$seance.'<br>';
echo '<b>Date Jouissance : </b>'.$_emprunt->get_dateJouissance().'<br>';
echo '<b>Cours en % : </b>'.$cours.'<br>';

$dateSeance = new DateTime($seance); 
$dateJouissance = new DateTime($_emprunt->get_dateJouissance()); 
$diff = $dateJouissance->diff($dateSeance); 
$N=365;

$VN = $nominal - ($diff->y * $amortissment );
echo '<b>VN : </b>'.$VN.'<br>';
$isLeapYear = (bool) date('L', strtotime($dateSeance->format('Y')."-01-01"));
if ($isLeapYear) $N=366;
echo '<b>N : </b>'.$N.'<br>';
$i = $dateJouissance->format('Y');
$max = $dateSeance->format('Y');
$dernierjourpay =new DateTime();
//$dernierjourpay->setDate($i,$dateJouissance->format('m'),$dateJouissance->format('d'));
while ($i < $max ){
	
	//echo 'i : '.$i.'<br>';
	
	$i++;
	//if (var_dump($dernierjourpay < $dateSeance) == true )  {}
	if (var_dump($dernierjourpay < $dateSeance) == false ) {
		$dernierjourpay->setDate($i,$dateJouissance->format('m'),$dateJouissance->format('d'));
		  }
	
	}
	
echo '<b>Date Dernier jour de paiement : </b> '.$dernierjourpay->format('Y').'-'.$dernierjourpay->format('m').'-'.$dernierjourpay->format('d').'<br>';
$diff_nbrjours = $dernierjourpay->diff($dateSeance);
echo 'Nombre Jours : '.$diff_nbrjours->days.'<br>';
$nbrjours = $diff_nbrjours->days;
$dayDenou = "";
$days = date("l", mktime(0, 0, 0, $dateSeance->format('m'), $dateSeance->format('m'), $dateSeance->format('Y')));
if ($days == "Monday") {echo " Jour Séance : Monday".'<br>'; $nbrjours +=3; $dayDenou="Wednesday";}
if ($days == "Tuesday") {echo "Jour Séance : Tuesday".'<br>'; $nbrjours +=3;$dayDenou="Thursday";}
if ($days == "Wednesday") {echo "Jour Séance : Wednesday".'<br>';$nbrjours +=5;$dayDenou="Sunday";}
if ($days == "Thursday") {echo "Jour Séance : Thursday".'<br>'; $nbrjours +=5;$dayDenou="Monday";}
if ($days == "Friday") {echo "Jour Séance : Friday".'<br>';$nbrjours +=5;$dayDenou="Tuesday";}
if ($days == "Saturday") {echo "Saturday! pas de transaction";}
if ($days == "Sunday") {echo "Sunday ! pas de transaction";}
echo '<b>Jour  Denouement : </b>'.$dayDenou.'<br>';
$coursPer= round(($cours/100), 2);
echo 'Cours Per : '.$coursPer.'<br>';
//echo $nbrjours.'<br>';
$taux= ($_emprunt->get_tauxInteret()/100);
echo 'Taux Per : '.$taux.'<br>';
$MT = ((($VN * $coursPer) + ($VN * $taux * ($nbrjours)) / $N ) * $quantite);
$MTround= round($MT, 3);
echo '<b>MT : '.$MT.'<br></b>';
echo '<b>MT Round : '.$MTround.'<br></b>';
		
		?>
					
                                    
							  </article>
						</div>
					</div>		
				</div>
			</div>
		
	</body>
</html>