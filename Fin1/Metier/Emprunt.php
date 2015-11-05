<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Emprunt {
    //put your code here
    private $_libelleEmp;
    private $_emetteur;
    private $_inter;
    private $_codeISIN;
    private $_mnemonique;
    private $_libelle;
    private $_tauxInteret;
    private $_duree;
    private $_nominal;
    private $_modeAmmort;
    private $_nbObligations;
    private $_montant;
    private $_dateJouissance;
    private $_datePremEcheance;
    private $_dateDerEcheance;
    
    function __construct($_libelleEmp, $_emetteur, $_inter, $_codeISIN, $_mnemonique, $_libelle, $_tauxInteret, $_duree, $_nominal, $_modeAmmort, $_nbObligations, $_montant, $_dateJouissance, $_datePremEcheance, $_dateDerEcheance) {
        $this->_libelleEmp = $_libelleEmp;
        $this->_emetteur = $_emetteur;
        $this->_inter = $_inter;
        $this->_codeISIN = $_codeISIN;
        $this->_mnemonique = $_mnemonique;
        $this->_libelle = $_libelle;
        $this->_tauxInteret = $_tauxInteret;
        $this->_duree = $_duree;
        $this->_nominal = $_nominal;
        $this->_modeAmmort = $_modeAmmort;
        $this->_nbObligations = $_nbObligations;
        $this->_montant = $_montant;
        $this->_dateJouissance = $_dateJouissance;
        $this->_datePremEcheance = $_datePremEcheance;
        $this->_dateDerEcheance = $_dateDerEcheance;
    }
    
    public function get_libelleEmp() {
        return $this->_libelleEmp;
    }

    public function get_emetteur() {
        return $this->_emetteur;
    }

    public function get_inter() {
        return $this->_inter;
    }

    public function get_codeISIN() {
        return $this->_codeISIN;
    }

    public function get_mnemonique() {
        return $this->_mnemonique;
    }

    public function get_libelle() {
        return $this->_libelle;
    }

    public function get_tauxInteret() {
        return $this->_tauxInteret;
    }

    public function get_duree() {
        return $this->_duree;
    }

    public function get_nominal() {
        return $this->_nominal;
    }

    public function get_modeAmmort() {
        return $this->_modeAmmort;
    }

    public function get_nbObligations() {
        return $this->_nbObligations;
    }

    public function get_montant() {
        return $this->_montant;
    }

    public function get_dateJouissance() {
        return $this->_dateJouissance;
    }

    public function get_datePremEcheance() {
        return $this->_datePremEcheance;
    }

    public function get_dateDerEcheance() {
        return $this->_dateDerEcheance;
    }

    public function set_libelleEmp($_libelleEmp) {
        $this->_libelleEmp = $_libelleEmp;
    }

    public function set_emetteur($_emetteur) {
        $this->_emetteur = $_emetteur;
    }

    public function set_inter($_inter) {
        $this->_inter = $_inter;
    }

    public function set_codeISIN($_codeISIN) {
        $this->_codeISIN = $_codeISIN;
    }

    public function set_mnemonique($_mnemonique) {
        $this->_mnemonique = $_mnemonique;
    }

    public function set_libelle($_libelle) {
        $this->_libelle = $_libelle;
    }

    public function set_tauxInteret($_tauxInteret) {
        $this->_tauxInteret = $_tauxInteret;
    }

    public function set_duree($_duree) {
        $this->_duree = $_duree;
    }

    public function set_nominal($_nominal) {
        $this->_nominal = $_nominal;
    }

    public function set_modeAmmort($_modeAmmort) {
        $this->_modeAmmort = $_modeAmmort;
    }

    public function set_nbObligations($_nbObligations) {
        $this->_nbObligations = $_nbObligations;
    }

    public function set_montant($_montant) {
        $this->_montant = $_montant;
    }

    public function set_dateJouissance($_dateJouissance) {
        $this->_dateJouissance = $_dateJouissance;
    }

    public function set_datePremEcheance($_datePremEcheance) {
        $this->_datePremEcheance = $_datePremEcheance;
    }

    public function set_dateDerEcheance($_dateDerEcheance) {
        $this->_dateDerEcheance = $_dateDerEcheance;
    }

	public function __toString() {
        return("<table><tr><td><font color=red>libelleEmp :</font></td><td> $this->_libelleEmp</font></td></tr><tr><td><font color=red> emetteur :</font></td><td> $this->_emetteur </td></tr><tr><td><font color=red> inter. charge :</font></td><td> $this->_inter </td></tr><tr><td><font color=red> codeISIN :</font></td><td> $this->_codeISIN </td></tr><tr><td><font color=red> mnemonique :</font></td><td> $this->_mnemonique </td></tr><tr><td><font color=red> libelle :</font></td><td> $this->_libelle </td></tr><tr><td><font color=red> tauxInteret :</font></td><td> $this->_tauxInteret </td></tr><tr><td><font color=red> duree :</font></td><td> $this->_duree </td></tr><tr><td><font color=red> nominal :</font></td><td> $this->_nominal </td></tr><tr><td><font color=red> modeAmmort :</font></td><td> $this->_modeAmmort </td></tr><tr><td><font color=red> nbObligations :</font></td><td> $this->_nbObligations </td></tr><tr><td><font color=red> montant :</font></td><td> $this->_montant </td></tr><tr><td><font color=red> dateJouissance :</font></td><td> $this->_dateJouissance </td></tr><tr><td><font color=red> datePremEcheance :</font></td><td> $this->_datePremEcheance </td></tr><tr><td><font color=red> dateDerEcheance :</font></td><td> $this->_dateDerEcheance </td></tr>");
    }

}
