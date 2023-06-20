<?php

class CiudadModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listCiudad($ciudad)
    {
        $sql = "SELECT * FROM distribuidora.ciudad WHERE cod_departamento = '$ciudad'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}
