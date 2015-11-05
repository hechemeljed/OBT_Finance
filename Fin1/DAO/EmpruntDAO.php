<?php
class EmpruntDAO {

private $_GestionBD;

    public function Load($_id){
        $_emprunt=null;
        $_requette = "select * from Emprunt where id=$_id";
        if ($resultat = mysqli_query(mysqli_connect("localhost","root","","finance"), $_requette)) {
            while ($_objet = mysqli_fetch_object($resultat)) {		
                $_emprunt = new Emprunt($_objet->libelleEmp,$_objet->emetteur,$_objet->inter,$_objet->codeISIN,$_objet->mnemonique,$_objet->libelle,$_objet->tauxInteret,$_objet->duree,$_objet->nominal,$_objet->modeAmmort,$_objet->nbObligations,$_objet->montant,$_objet->dateJouissance,$_objet->datePremEcheance,$_objet->dateDerEcheance);
        }}
        return $_emprunt;
    }
	
	public function LoadByIsin($isin){
        $_emprunt=null;
        $_requette = "select * from Emprunt where codeISIN like '%$isin%'";
        if ($resultat = mysqli_query(mysqli_connect("localhost","root","","finance"), $_requette)) {
            while ($_objet = mysqli_fetch_object($resultat)) {		
                $_emprunt = new Emprunt($_objet->libelleEmp,$_objet->emetteur,$_objet->inter,$_objet->codeISIN,$_objet->mnemonique,$_objet->libelle,$_objet->tauxInteret,$_objet->duree,$_objet->nominal,$_objet->modeAmmort,$_objet->nbObligations,$_objet->montant,$_objet->dateJouissance,$_objet->datePremEcheance,$_objet->dateDerEcheance);
        }}
        return $_emprunt;
    }
	
	public function recherche($_id){
        $_emprunt=null;
        $_requette = "select * from Emprunt where libelleEmp like '%$_id%'";
        if ($resultat = mysqli_query(mysqli_connect("localhost","root","","finance"), $_requette)) {
            while($_objet = mysqli_fetch_object($resultat)) {				
                $_emprunt = new Emprunt($_objet->libelleEmp,$_objet->emetteur,$_objet->inter,$_objet->codeISIN,$_objet->mnemonique,$_objet->libelle,$_objet->tauxInteret,$_objet->duree,$_objet->nominal,$_objet->modeAmmort,$_objet->nbObligations,$_objet->montant,$_objet->dateJouissance,$_objet->datePremEcheance,$_objet->dateDerEcheance);
				echo "<br><br>";
				echo "<div align=center> $_emprunt </div>";	
	  }}
        
    }
	
	public function affiche($id){
        $_emprunt=null;
        $_requette = "select * from Emprunt where id=$id";
        if ($resultat = mysqli_query(mysqli_connect("localhost","root","","finance"), $_requette)) {
            while($_objet = mysqli_fetch_object($resultat)) {				
                $_emprunt = new Emprunt($_objet->libelleEmp,$_objet->emetteur,$_objet->inter,$_objet->codeISIN,$_objet->mnemonique,$_objet->libelle,$_objet->tauxInteret,$_objet->duree,$_objet->nominal,$_objet->modeAmmort,$_objet->nbObligations,$_objet->montant,$_objet->dateJouissance,$_objet->datePremEcheance,$_objet->dateDerEcheance);
				echo "<br><br>";
				echo "<div align=center> $_emprunt </div>";	
	  }}
        
    }
    
    
    public function Add($_libelleEmp, $_emetteur, $_inter, $_codeISIN, $_mnemonique, $_libelle, $_tauxInteret, $_duree, $_nominal, $_modeAmmort, $_nbObligations, $_montant, $_dateJouissance, $_datePremEcheance, $_dateDerEcheance){
        $_requette="insert into emprunt(`libelleEmp`, `emetteur`, `inter`, `codeISIN`, `mnemonique`, `libelle`, `tauxInteret`, `duree`, `nominal`, `modeAmmort`, `nbObligations`, `montant`, `dateJouissance`, `datePremEcheance`, `dateDerEcheance`) values ('$_libelleEmp','$_emetteur','$_inter','$_codeISIN','$_mnemonique','$_libelle','$_tauxInteret',$_duree,$_nominal,'$_modeAmmort',$_nbObligations,$_montant,'$_dateJouissance','$_datePremEcheance','$_dateDerEcheance');";
        $resultat = mysqli_query(mysqli_connect("localhost","root","","finance"), $_requette);
        
    }
    
    public function AddObj($_emprunt){
        $_libelleEmp=$_emprunt->get_libelleEmp();
        $_emetteur=$_emprunt->get_emetteur();
        $_inter=$_emprunt->get_inter();
        $_codeISIN=$_emprunt->get_codeISIN();
        $_mnemonique=$_emprunt->get_mnemonique();
        $_libelle=$_emprunt->get_libelle();
        $_tauxInteret=$_emprunt->get_tauxInteret();
        $_duree=$_emprunt->get_duree(); 
        $_nominal=$_emprunt->get_nominal();
        $_modeAmmort=$_emprunt->get_modeAmmort();
        $_nbObligations=$_emprunt->get_nbObligations();
        $_montant=$_emprunt->get_montant(); 
        $_dateJouissance=$_emprunt->get_dateJouissance();
        $_datePremEcheance=$_emprunt->get_datePremEcheance();
        $_dateDerEcheance=$_emprunt->get_dateDerEcheance();
       $_requette="insert into emprunt(`libelleEmp`, `emetteur`, `inter`, `codeISIN`, `mnemonique`, `libelle`, `tauxInteret`, `duree`, `nominal`, `modeAmmort`, `nbObligations`, `montant`, `dateJouissance`, `datePremEcheance`, `dateDerEcheance`) values ('$_libelleEmp','$_emetteur','$_inter','$_codeISIN','$_mnemonique','$_libelle','$_tauxInteret',$_duree,$_nominal,'$_modeAmmort',$_nbObligations,$_montant,'$_dateJouissance','$_datePremEcheance','$_dateDerEcheance');";
		$resultat = mysqli_query(mysqli_connect("localhost","root","","finance"), $_requette);
        
    }
    
    
    public function Update($_emprunt){
        $_libelleEmp=$_emprunt->get_libelleEmp();
        $_emetteur=$_emprunt->get_emetteur();
        $_inter=$_emprunt->get_inter();
        $_codeISIN=$_emprunt->get_codeISIN();
        $_mnemonique=$_emprunt->get_mnemonique();
        $_libelle=$_emprunt->get_libelle();
        $_tauxInteret=$_emprunt->get_tauxInteret();
        $_duree=$_emprunt->get_duree(); 
        $_nominal=$_emprunt->get_nominal();
        $_modeAmmort=$_emprunt->get_modeAmmort();
        $_nbObligations=$_emprunt->get_nbObligations();
        $_montant=$_emprunt->get_montant(); 
        $_dateJouissance=$_emprunt->get_dateJouissance();
        $_datePremEcheance=$_emprunt->get_datePremEcheance();
        $_dateDerEcheance=$_emprunt->get_dateDerEcheance();
        $_requette = "update emprunt set libelleEmp='$_libelleEmp',emetteur='$_emetteur',inter='$_inter',codeISIN='$_codeISIN',mnemonique='$_mnemonique',libelle='$_libelle',tauxInteret='$_tauxInteret',duree='$_duree',nominal='$_nominal',modeAmmort='$_modeAmmort',nbObligations='$_nbObligations',montant='$_montant',dateJouissance='$_dateJouissance',datePremEcheance='$_datePremEcheance',dateDerEcheance='$_dateDerEcheance' where libelleEmp='$_libelleEmp';";
        $resultat = mysqli_query(mysqli_connect("localhost","root","","finance"), $_requette);
    
    }
    
    public function dropO($_emprunt){
        $_libelleEmp=$_emprunt->get_libelleEmp();
        $_requette = "delete from emprunt where libelleEmp='$_libelleEmp';";
        $resultat = mysqli_query(mysqli_connect("localhost","root","","finance"), $_requette);
        
    }
    
    public function drop($_libelleEmp){
        $_requette = "delete from emprunt where libelleEmp='$_libelleEmp';";
        $resultat = mysqli_query(mysqli_connect("localhost","root","","finance"), $_requette);
        
    }
}