<?php

namespace App\Models;
use Carbon\Carbon;

require_once ("BasicModel.php");

class Carro extends BasicModel
{
    //Propiedades
    protected int $id;
    protected string $marca; //Visibilidad (public, protected, private)
    protected string $color; // Tipos (bool, int, float, null, array, object)
    protected int $anno;
    protected bool $cajaAutomatica; // LowerCamelCase
    protected float $cantidadGasolina;
    protected string $estado; // Disponible, Vendido, Apartado, En Reparacion, Inactivo

    //Variable
    private array $marcasExcluidas = array('lexus', 'opel', 'porche');

    //Metodo Constructor
    public function __construct($arrCarro = array())
    {
        parent::__construct();
        $this->setMarca($arrCarro['marca'] ?? "Generica"); //Propiedad recibida y asigna a una propiedad de la clase
        $this->setColor($arrCarro['color'] ?? "Rojo");
        $this->setAnno($arrCarro['anno'] ?? 0);
        $this->setCajaAutomatica($arrCarro['cajaAutomatica'] ?? "No");
        $this->setCantidadGasolina($arrCarro['cantidadGasolina'] ?? 10); //Por defecto de fabrica salen con 10 litros de gasolina
        $this->setEstado($arrCarro['estado'] ?? "Disponible");
    }

    public function __destruct() // Cierro Conexiones
    {
        /*        echo "<span style='color: darkred'>";
                    echo $this->getMarca()." se ha destruido<br/>";
                echo "</span>";*/
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     */
    public function setMarca(string $marca): ?string
    {
        if (in_array(strtolower($marca), $this->marcasExcluidas)) {
            return "La marca del coche no esta aceptada";
        } else {
            $this->marca = $marca;
            return 'Se establecio la marca';
        }
    }

    /**
     * @return mixed|string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param mixed|string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return mixed|bool
     */
    public function getCajaAutomatica(): string
    {
        return ($this->cajaAutomatica) ? "si" : "no";
    }

    /**
     * @param mixed|bool $cajaAutomatica
     */
    public function setCajaAutomatica(string $cajaAutomatica): void
    {
        $this->cajaAutomatica = strtolower(trim($cajaAutomatica)) == "si";
    }

    /**
     * @return float|int
     */
    public function getCantidadGasolina(): float
    {
        return $this->cantidadGasolina;
    }

    /**
     * @param float|int $cantidadGasolina
     */
    public function setCantidadGasolina(float $cantidadGasolina): void
    {
        $this->cantidadGasolina = $cantidadGasolina;
    }

    /**
     * @return string
     */
    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     */
    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return int
     */
    public function getAnno(): int
    {
        return $this->anno;
    }

    /**
     * @param int $anno
     */
    public function setAnno(int $anno): void
    {
        $this->anno = $anno;
    }

    /**
     * @return mixed
     */
    public function save() : Carro
    {
        $result = $this->insertRow("INSERT INTO concesionario.carro VALUES (NULL, ?, ?, ?, ?, ?, ?)", array(
                $this->getMarca(),
                $this->getColor(),
                $this->getAnno(),
                $this->getCajaAutomatica(),
                $this->getCantidadGasolina(),
                $this->getEstado()
            )
        );
        $this->Disconnect();
        return $this;
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $result = $this->updateRow("UPDATE concesionario.carro SET marca = ?, color = ?, anno = ?, cajaAutomatica = ?, cantidadGasolina = ?, estado = ? WHERE id = ?", array(
                $this->getMarca(),
                $this->getColor(),
                $this->getAnno(),
                $this->getCajaAutomatica(),
                $this->getCantidadGasolina(),
                $this->getEstado(),
                $this->getId()
            )
        );
        $this->Disconnect();
        return $this;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleted($id)
    {
        $result = $this->updateRow("UPDATE concesionario.carro SET estado = ? WHERE id = ?", array(
                'Inactivo',
                $this->getId()
            )
        );
        $this->Disconnect();
        return $this;
    }

    /**
     * @param $query
     * @return mixed
     */
    public static function search($query) // Select * from carro where marca = 'Mclaren'
    {
        $arrCarros = array();
        $tmp = new Carro();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Carro = new Carro();
            $Carro->setId($valor['id']);
            $Carro->setMarca($valor['marca']);
            $Carro->setColor($valor['color']);
            $Carro->setAnno($valor['anno']);
            $Carro->setCajaAutomatica($valor['cajaAutomatica']);
            $Carro->setCantidadGasolina($valor['cantidadGasolina']);
            $Carro->setEstado($valor['estado']);
            $Carro->Disconnect();
            array_push($arrCarros, $Carro);
        }
        $tmp->Disconnect();
        return $arrCarros;
    }

    /**
     * @return mixed
     */
    public static function getAll()
    {
        return Carro::search("SELECT * FROM concesionario.carro");
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function searchForId($id) // 5
    {
        $Carro = null;
        if ($id > 0) {
            $Carro = new Carro();
            $getrow = $Carro->getRow("SELECT * FROM concesionario.carro WHERE id =?", array($id));
            $Carro->setId($getrow['id']);
            $Carro->setMarca($getrow['marca']);
            $Carro->setColor($getrow['color']);
            $Carro->setAnno($getrow['anno']);
            $Carro->setCajaAutomatica($getrow['cajaAutomatica']);
            $Carro->setCantidadGasolina($getrow['cantidadGasolina']);
            $Carro->setEstado($getrow['estado']);
        }
        $Carro->Disconnect();
        return $Carro;
    }

    //Metodo
    public function saludar(?string $nombre = "Usuario"): string
    { //Visibilidad, function, nombre metodo(parametros), retorno
        return "Hola " . $nombre . ", Soy " . $this->marca . " de color " . $this->color . " como estas?";
    }

    public function tanquear(float $litros): Carro
    {
        $this->cantidadGasolina += $litros;
        return $this;
    }

    public function viajar(int $kilometros): Carro
    {
        $consumo = $kilometros / 50;
        $this->cantidadGasolina -= $consumo;
        return $this;
    }

    static function carroRegistrado(string $marca, int $anno){
        $marca = strtolower(trim($marca));
        $result = Carro::search("SELECT * FROM concesionario.carro where marca = '" . $marca. "' and anno = ".$anno);
        if ( count ($result) > 0 ) {
            return true;
        } else {
            return false;
        }
    }

    public function __toString(): string
    {
        $typeOutput = "<br/>";
        return "Marca: " . $this->getMarca() . $typeOutput .
            "Color: " . $this->getColor() . $typeOutput .
            "Año: " . $this->getAnno() . $typeOutput .
            "Caja Automatica: " . $this->getCajaAutomatica() . $typeOutput .
            "Estado: " . $this->getEstado() . $typeOutput .
            "Cantidad de Gasolina: " . $this->getCantidadGasolina() . $typeOutput;
    }

}