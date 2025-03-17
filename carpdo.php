<?php
require("dbvezerlopdo.php");

class Car {
    private $db;

    public function __construct(){
        $this->db = new DBController();
    }

    public function getAllcars(){
        $query = "SELECT c_id, c_desc, path FROM tb1_car";
        return $this->db->executeSelectQuery($query);
    }

    public function getcarsById($carId) {
        $query = "SELECT c_id, c_desc, path 
        FROM tb1_car WHERE c_id = ?";
        return $this->db->executeSelectQuery($query, [$carId]);
    }

    public function getcarsByType($ct_desc) {
        $query = "SELECT c_id, c_desc, path, car_type.ct_desc
        FROM tb1_car
        inner join car_type on car_type.ct_id=tb1_car.c_id
        where car_type.ct_desc = ?";
        return $this->db->executeSelectQuery($query, [$ct_desc]);

    }
}


?>