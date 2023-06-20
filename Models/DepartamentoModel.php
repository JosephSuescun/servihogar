<?php

class DepartamentoModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listDepartamento($pais)
    {
        $sql = "SELECT * FROM distribuidora.departamento WHERE cod_pais = '$pais'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}
