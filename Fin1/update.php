<!DOCTYPE HTML>


<html>
	<head>
		<title>Modification | Emprunt OBL</title>
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
                    <h1>Modification | Emprunt OBL</h1>
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

	$id=$_GET['id'];
	$_Connexion=new ConnexionBD();
        $_Connexion->connect();
        $_GestionBD = new GestionBD($_Connexion);
		$_empruntDAO=new EmpruntDAO($_GestionBD);
		 $_emprunt = new Emprunt("","","","","","","","","","","","","","","");
		$_emprunt = $_empruntDAO->Load($id);
	
?>						
									 <form action="edit.php" method="POST"> 
    			<p class="contact"><label for="name">Libelle Emprunt</label></p> 
    		<input id="libelleEmp" name="libelleEmp"  value="<?php echo $_emprunt->get_libelleEmp(); ?>" type="text"> 
    			 
    			<p class="contact"><label for="name">Emetteur</label></p> 
    			<input id="emetteur" name="emetteur" value="<?php echo $_emprunt->get_emetteur(); ?>" tabindex="1" type="text" onchange="ecrire()"> 
                
                <p class="contact"><label for="name">Inter. chargé</label></p> 
    			<input id="inter" name="inter" value="<?php echo $_emprunt->get_inter(); ?>" required="" tabindex="1" type="text"> 
    			 
                <p class="contact"><label for="name">Code ISIN</label></p> 
    			<input id="isin" name="isin" value="<?php echo $_emprunt->get_codeISIN(); ?>" tabindex="1" type="text" onBlur="validateISIN()"> 
				
				<p class="contact"><label for="name">Mnémonique</label></p> 
    			<input id="mnemonique" name="mnemonique"  value="<?php echo $_emprunt->get_mnemonique(); ?>" tabindex="1" type="text">
				
				<p class="contact"><label for="name">Libelle</label></p> 
    			<input id="libelle" name="libelle" value="<?php echo $_emprunt->get_libelle(); ?>" required="" tabindex="1" type="text">
				<p>
                 <label>TMN</label>
                  
                 <select name="tmm" id="tmm" onChange="validateTaux()">
				 <option value="non">Non</option>
				 <option value="oui">Oui</option>
				 </select>
				  
                 </select> 
				</p>
				<br><br>
				<p class="contact"><label for="name">Taux d'interet brut</label></p> 
    			<input id="taux" name="taux" value="<?php echo $_emprunt->get_tauxInteret(); ?>" required="" tabindex="1" type="text" onchange="ecrire()" >
				
				<p class="contact"><label for="name">Durée</label></p> 
    			<input id="duree" name="duree" value="<?php echo $_emprunt->get_duree(); ?>" required="" tabindex="1" type="text" onchange="ecrire()">
				
				<p class="contact"><label for="name">Nominal</label></p> 
    			<input id="nominal" name="nominal" value="<?php echo $_emprunt->get_nominal(); ?>" required="" tabindex="1" type="text" onBlur="validateNominal()">
				
				<p class="contact"><label for="name">Mode d'amortissement</label></p> 
    			<input id="mode" name="mode" value="<?php echo $_emprunt->get_modeAmmort(); ?>" tabindex="1" type="text" onchange="ecrire(")> 
				
				<p class="contact"><label for="name">Nombre obligatoire</label></p> 
    			<input id="nombre" name="nombre" value="<?php echo $_emprunt->get_nbObligations(); ?>" tabindex="1" type="text" onBlur="validateNombre()"> 
				
				<p class="contact"><label for="name">Montant souscrit</label></p> 
    			<input id="montant" name="montant" value="<?php echo $_emprunt->get_montant(); ?>" required="" tabindex="1" type="text" >
                <br><br>
                
				<table>
                <tr><td><p class="contact"><label for="name">Date de joussance</label></td>
    			<td><input id="dateJ" name="dateJ" value="<?php echo $_emprunt->get_dateJouissance(); ?>" required="" tabindex="1" type="Date"></p></td></tr>	
				
				<tr><td><p class="contact"><label for="name">Date Premiere Echeance</label></td>
    			<td><input id="datePE" name="datePE" value="<?php echo $_emprunt->get_datePremEcheance(); ?>" required="" tabindex="1" type="Date"></p></td></tr>
				
				<tr><td><p class="contact"><label for="name">Date Derniere Echeance</label></td>
    			<td><input id="dateDE" name="dateDE" value="<?php echo $_emprunt->get_dateDerEcheance(); ?>" required="" tabindex="1" type="Date" onBlur="validateDateDE()" onchange="ecrire()"></p></td></tr>
				</table>
			
            <div align="left"><input class="buttom" name="submit" id="submit" tabindex="5" value="Modifier" type="submit">
            <a href="read.php" target="_self">Annuler</a> </div>	 
   </form> 

										
                                    
							  </article>
						</div>
					</div>		
				</div>
			</div>
		
	</body>
</html>