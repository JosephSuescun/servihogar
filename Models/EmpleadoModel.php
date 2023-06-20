<?php

class EmpleadoModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listEmpleado()
    {
        //$sql = "SELECT * FROM distribuidora.empleado";
        $sql = "SELECT em.* , te.* FROM distribuidora.empleado em, distribuidora.tipo_empleado te WHERE em.tipo_id=te.tipo_id";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function insertEmpleado($emp_documento, $emp_codigo, $emp_nombre1, $emp_nombre2, $emp_apellido1, $emp_apellido2, $emp_direccion, $emp_sexo, $emp_celular, $emp_email, $tipo_id)
    {
        $sql = "INSERT INTO distribuidora.empleado (emp_documento, emp_codigo, emp_nombre1, emp_nombre2, emp_apellido1, emp_apellido2, emp_direccion, emp_sexo, emp_celular, emp_email, tipo_id)
                                            VALUES ('$emp_documento', '$emp_codigo', '$emp_nombre1', '$emp_nombre2', '$emp_apellido1', '$emp_apellido2', '$emp_direccion', '$emp_sexo', '$emp_celular', '$emp_email', '$tipo_id')";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function selectEmpleado($emp_documento)
    {
        $sql = "SELECT em.* , te.* FROM distribuidora.empleado em , distribuidora.tipo_empleado te WHERE em.tipo_id=te.tipo_id AND emp_documento = '$emp_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateEmpleado($emp_documento, $emp_codigo, $emp_nombre1, $emp_nombre2, $emp_apellido1, $emp_apellido2, $emp_direccion, $emp_sexo, $emp_celular, $emp_email, $tipo_id)
    {
        $sql = "UPDATE distribuidora.empleado SET
            emp_codigo = '$emp_codigo',
            emp_nombre1 = '$emp_nombre1',
            emp_nombre2 = '$emp_nombre2',
            emp_apellido1 = '$emp_apellido1',
            emp_apellido2 = '$emp_apellido2',
            emp_direccion = '$emp_direccion',
            emp_sexo = '$emp_sexo',
            emp_celular = '$emp_celular',
            emp_email = '$emp_email',
            tipo_id = '$tipo_id'
            WHERE emp_documento = '$emp_documento'
        ";
        $this->Connection->query($sql);
    }

    function consultDocumentEmp($emp_documento){

        $sql = "SELECT * FROM distribuidora.empleado WHERE emp_documento='$emp_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function consultCodEmp($emp_codigo){

        $sql = "SELECT * FROM distribuidora.empleado WHERE emp_codigo='$emp_codigo'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}
