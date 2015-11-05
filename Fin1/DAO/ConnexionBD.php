<?php

class  ConnexionBD {
    private  $_host;
    private  $_user;
    private  $_pass;
    private  $_bd;
    private  $_link;
            function __construct() {
        $this->_host="localhost";
        $this->_user="root";
        $this->_pass=""; 
        $this->_bd="finance";
    }
   
    public function connect() {
        
        $connexion=mysqli_connect("localhost","root","","finance");
        if (mysqli_connect_errno($connexion))
            { echo "Errreur de conexion" ;
			?><script language="javascript"> $.bootstrapGrowl("Errreur de conexion !")</script><?php }
            else { 
            $this->_link=mysqli_connect("localhost","root","","finance");
			?><script language="javascript"> $.bootstrapGrowl("Connected to MySQL !")</script><?php
            }
    }

    public function get_host() {
        return $this->_host;
    }

    public function set_host($_host) {
        $this->_host = $_host;
    }

    public function get_user() {
        return $this->_user;
    }

    public function set_user($_user) {
        $this->_user = $_user;
    }

    public function get_pass() {
        return $this->_pass;
    }

    public function set_pass($_pass) {
        $this->_pass = $_pass;
    }

    public function get_bd() {
        return $this->_bd;
    }

    public function set_bd($_bd) {
        $this->_bd = $_bd;
    }
    public function get_link() {
        return $this->_link;
    }

    public function set_link($_link) {
        $this->_link = $_link;
    }




    
}

?>
