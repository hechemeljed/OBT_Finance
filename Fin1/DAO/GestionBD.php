<?php


class GestionBD {

    private $_connexion;

    public function __construct($_conn) {
        $this->_connexion = $_conn;
    }

    public function get_connexion() {
        return $this->_connexion;
    }

    public function set_connexion($_connexion) {
        $this->_connexion = $_connexion;
    }
	
}

?>
