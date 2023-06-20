<?php

class RolModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listRol()
    {

        $sql = "SELECT * FROM distribuidora.tipo_empleado";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();

    }
}
