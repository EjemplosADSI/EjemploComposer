<?php

namespace App\Controllers;

require (__DIR__.'/../../vendor/autoload.php'); //Requerido para convertir un objeto en Array
require_once(__DIR__ . '/../Models/Carro.php');
require_once(__DIR__ . '/../Models/GeneralFunctions.php');

use App\Models\GeneralFunctions;
use App\Models\Carro;

if (!empty($_GET['action'])) { //CarroController.php?action=create
    CarroController::main($_GET['action']);
}

class CarroController
{

    static function main($action)
    {
        if ($action == "create") {
            CarroController::create();
        } else if ($action == "edit") {
            CarroController::edit();
        } else if ($action == "searchForID") {
            CarroController::searchForID($_REQUEST['idPersona']);
        } else if ($action == "searchAll") {
            CarroController::getAll();
        }  else if ($action == "changeStatus") {
            CarroController::changeStatus();
        }
    }

    static public function create()
    {
        try {
            $arrayCarro = array();
            $arrayCarro['marca'] = $_POST['marca'];
            $arrayCarro['color'] = $_POST['color'];
            $arrayCarro['anno'] = $_POST['anno'];
            $arrayCarro['cajaAutomatica'] = $_POST['cajaAutomatica'];
            $arrayCarro['cantidadGasolina'] = $_POST['cantidadGasolina'];
            $arrayCarro['estado'] = $_POST['estado'];

            if (!Carro::carroRegistrado($arrayCarro['marca'], $arrayCarro['anno'])) {
                $Carro = new Carro($arrayCarro);
                if ($Carro->save()) {
                    header("Location: ../../views/modules/carro/index.php?action=create&respuesta=correcto");
                }
            } else {
                header("Location: ../../views/modules/carro/create.php?respuesta=error&mensaje=Carro ya registrado");
            }
        } catch (Exception $e) {
            GeneralFunctions::console($e, 'error', 'errorStack');
            //header("Location: ../../views/modules/usuarios/create.php?respuesta=error&mensaje=" . $e->getMessage());
        }
    }

}