<?php
namespace roc\dbapiclients;

include_once 'DBconn.php';

class client extends DBconn{


    public function readClients(){
        $result = $this->connect()->query('SELECT * FROM clients');
        return $result;

    }

    public function readClientsForDomain($domain){
        $result = $this->connect()->query('SELECT * FROM clients WHERE clientEmail LIKE "%@'.$domain.'.%"');
        return $result;
    }

    public function readClientsForDate($date){
        $result = $this->connect()->query('SELECT * FROM clients WHERE date="'.$date.'"');
        return $result;
    }

    
    public function insert($datos){
        $sql = 'INSERT INTO clients VALUES ("'.$datos["clientID"].'","'.$datos["clientEmail"].'","'.$datos["date"].'","'.$datos["orderQty"].'")';
        $result = $this->connect()->query($sql);
        $this->disconnect();
        return $result;
    }
}

?>