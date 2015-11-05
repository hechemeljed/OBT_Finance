<?php 
include 'DAO/ConnexionBD.php';
include 'DAO/GestionBD.php';
include 'DAO/EmpruntDAO.php';
include 'Metier/Emprunt.php';



		$_libelleEmp =$_POST['libelleEmp'];
        $_emetteur =$_POST['emetteur'];
		$_inter =$_POST['inter'];
		$_isin =$_POST['isin'];
		$_mnemonique =$_POST['mnemonique'];
		$_libelle =$_POST['libelle'];
		$_taux =$_POST['taux'];
		$_duree =$_POST['duree'];
		$_nominal =$_POST['nominal'];
		$_mode =$_POST['mode'];
		$_nombre =$_POST['nombre'];
		$_montant =$_POST['montant'];
		$_dateJ =$_POST['dateJ'];
		$_datePE =$_POST['datePE'];
		$_dateDE =$_POST['dateDE'];
		
		$_Connexion=new ConnexionBD();
        $_Connexion->connect();
        $_GestionBD = new GestionBD($_Connexion);
		$_empruntDAO=new EmpruntDAO($_GestionBD);
		$_emprunt=new emprunt($_libelleEmp,$_emetteur,$_inter,$_isin,$_mnemonique,$_libelle,$_taux,$_duree,$_nominal,$_mode,$_nombre,$_montant,$_dateJ,$_datePE,$_dateDE);
		//echo $_emprunt;
		try {
		$_empruntDAO->Update($_emprunt);
		?><script language="javascript"> $.bootstrapGrowl("Emprunt updated !")</script><?php
		}
		catch (Exception $e){
		?><script language="javascript"> $.bootstrapGrowl("Error !")</script><?php
		}
		header("Location: index.php#start");
		
		?>
