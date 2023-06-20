<?php
class PaisModel
{

    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listPais()
    {
        $sql = "SELECT * FROM distribuidora.pais";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function listPais1($pais)
    {
        $sql = "SELECT * FROM distribuidora.departamento WHERE cod_pais = '$pais'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}
