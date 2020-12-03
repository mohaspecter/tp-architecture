<?php
    require_once('config.php'); // File to set up the database

    class BDD{
        private $_host = HOST;
        private $_dbname = DATABASE;
        private $_login = USER;
        private $_password = PASSWORD;
        private $_bdd = null;
        
        function __construct(){ 
            $this->_connect();
        }
        
        private function _connect(){
            try{
                $this->_bdd = new PDO('mysql:host='. $this->_host
                                      .';dbname='. $this->_dbname
                                      .';charset=utf8',
                                      $this->_login ,
                                      $this->_password,
                                      [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
                                      );
            }catch(Exception $e){
                die("Erreur de connection a la BDD : ".$e->getMessage());
            }
        }
        
        public function get_bdd(){
            return $this->_bdd;
        }

    }
?>
