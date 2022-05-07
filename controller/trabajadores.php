<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Trabajadores.php");
    $trabajadores = new Trabajadores();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetAll":
            $datos = $trabajadores -> get_trabajadores();
            echo json_encode($datos);
        break;
            
        case "GetId":
            $datos = $trabajadores -> get_trabajadores_x_id($body["tra_id"]);
            echo json_encode($datos);
        break;

        case "Insert":
            $datos = $trabajadores -> insert_trabajadores($body["tra_nombres"],$body["tra_apellidos"],$body["tra_cedula"]);
            echo json_encode("Insert Correcto");
        break;

        case "Update":
            $datos = $trabajadores -> update_trabajadores($body["tra_id"],$body["tra_nombres"],$body["tra_apellidos"],$body["tra_cedula"]);
            echo json_encode("Update Correcto");
        break;

        case "Delete":
            $datos = $trabajadores -> delete_trabajadores($body["tra_id"]);
            echo json_encode("Delete Correcto");
        break;
    }
?>