<?php

require_once ('..\app\Models\Carro.php');
require_once ('..\app\Models\CarroDeportivo.php');

use App\Models\Carro;
use App\Models\CarroDeportivo;

$marca = $_POST['marca'];
$color = $_POST['color'];
$anno = $_POST['anno'];
$cajaAutomatica = ($_POST['cajaAutomatica'] == 'on') ? "Si" : "No";
$cantidadGasolina = $_POST['cantidadGasolina'];
$estado = $_POST['estado'];

$CarroUser = new Carro( $marca, $color, $anno, $cajaAutomatica, $cantidadGasolina, $estado);
var_dump($CarroUser->save());

//$arrDataCarro = array();

//$bmw = new Carro('BMW Antiguo',
//    'Verde',
//    2000,
//    "si",
//    "Disponible"); // Crear el objeto bmw de la clase Carro; A esto se le llama instanciacion.
//$bmw->create();

//$mercedes = new Carro(); //Segundo Objeto de la clase Objeto
//$audi = new Carro("Audi", "Naranja", 2017, "ni", "Disponible");

//$Mclaren = new Carro();
//$Mclaren->setId(10);
//$Mclaren->setMarca('Mclaren');
//$Mclaren->setCajaAutomatica('si');
//$Mclaren->setCantidadGasolina(80);
//$Mclaren->setAnno(2019);
//$Mclaren->update();
//
//$Mclaren->deleted(10); //Eliminacion Segura

//$arrCarros = Carro::search("SELECT * FROM concesionario.carro WHERE color = 'Verde'");
//var_dump($arrCarros);

//$Mclaren = Carro::searchForId(10);
//echo $Mclaren;

//$allCars = Carro::getAll();
//var_dump($allCars);

//echo $Mclaren;
//echo $Mclaren->saludar();

//echo $bmw->saludar('Diego');
//echo $mercedes->saludar('Juan');
//echo $audi->saludar('Pedro');
//echo $audi->getMarca()." es de caja automatica: ".$audi->getCajaAutomatica()."<br/>";
//
//$audi->tanquear(20) //30 Litros
//    ->viajar(100) // 28 Litros
//    ->viajar(200) // 24 Litros
//    ->tanquear(50)  // 74 Litros
//    ->viajar(300) // 68 Litros
//    ->tanquear(20); //88 Litros
//
//echo $bmw;
//
//echo "Soy ".$audi->getMarca()." y tengo ".$audi->getCantidadGasolina()." Litros de Gasolina<br/>";
//echo "Soy ".$bmw->getMarca()." y tengo ".$bmw->getCantidadGasolina()." Litros de Gasolina<br/>";
//
////Obtener una propiedad
////echo $bmw->color."<br/>";   //Para obtener la propiedad de un objeto se usa el conecto ->
////echo $mercedes->color."<br/>";
//
////Establecer una propiedad
//$bmw->setColor("Azul");   //Para establecer una propiedad se le asigna de la misma manera que una variable
//$bmw->setMarca("BMW");
////echo "Soy un ".$bmw->marca." ".$bmw->color."<br/>";   //Imprimimos los valores
//
//$mercedes->setColor("Negro");
//$mercedes->setMarca("Mercedes Benz");
////echo "Soy un ".$mercedes->marca." ".$mercedes->color."<br/>";   //Imprimimos los valores

//Llamar a un metodo
//echo $bmw->saludar('Diego')."<br/>"; //Llamar a un metodo
//echo "Saludo: ".$bmw->marca." ".$bmw->saludar('Juan')."<br/>"; //Concatenar salida