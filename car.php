<?php
require("dbvezerlo.php");

class Car{
    private $cars=[];
    public function __construct(){
        $query = "SELECT c_id, c_desc, path FROM tb1_car";
        $dbvez = new DBVezerlo();
        this->cars=$dbvez->executeSelectQuery($query);
        $dbvez->closeDB();
    }
    public function getAllcars(){
        return $this->cars;
    }
    public getcardById($carId){
        $query = "SELECT c_id, c_desc, path FROM tb1_car WHERE c_id =". $carId;
        $dbvez = new DBVezerlo();
        $this-> cars = $dbvez->executeSelectQuery($query);
        $dbvez->closeDB();
        return $this-> cars;

    }
    public function getcarsByType($ct_desc){
        $query = "SELECT c_id, c_desc, path, car_type.ct_desc FROM tb1_car inner join car_type on car_type.ct_id=tb1_car.c_id where car_type.ct_desc='".$ct_desc."'";
        $dbvez= new DBVezerlo();
        $this->cars=$dbvez->executeSelectQuery($query);
        $dbvez->closeDB();
        return $this->cars;
    }
}
?>