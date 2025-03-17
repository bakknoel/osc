<?php

require_once("restKezelo.php");
require 'car.php';

class CarrestKezelo extends RestKezelo
{
    function getAllcars()
    {
        $cars = new car();
        $sorAdat = $cars->getAllcars();

        if(empty($sorAdat))
        {
            $statusCode = 404;
            $sorAdat = array('error' => 'No cars found!');
        }
        else
        {
            $statusCode = 200;
        }
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=UTF-8');

        $result["cars"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "cars.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    function getcarById($c_id)
    {
        $oscars = new car();
        $sorAdat = $oscars->getcarsById($c_id);

        if(empty($sorAdat))
        {
            $statusCode = 404;
            $sorAdat = array('error' => 'No cars found by id!');
        }
        else
        {
            $statusCode = 200;
        }
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=UTF-8');

        $result["CarsById"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "CarsById.json";
        $this->prinfile($response, $file_path);
        echo $response;
    }

    function getCarsByType($ct_desc)
    {
        $oscars = new Car();
        $sorAdat = $oscars->getcarsByType($ct_desc);

        if(empty($sorAdat))
        {
            $statusCode = 404;
            $sorAdat = array('error' => 'No cars found by this type!');
        }
        else
        {
            $statusCode = 200;
        }
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=UTF-8');

        $result["Cars"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "CarsByType.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    function getFault()
    {
        $statusCode = 400;
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=UTF-8');
        $sorAdat = array('error' => 'Bad request');
        $result["Fault"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "Fault.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    function encodeJson($responseData)
    {
        return json_encode($responseData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    function printfile($responseData, $file_path)
    {
        file_put_contents($file_path, $responseData, LOCK_EX);
    }
}