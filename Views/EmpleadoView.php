<?php

class EmpleadoView
{
    function paginateEmpleado($array_empleado, $array_rol)
    {

?>

        <div class="card">
            <div class="card-header bg-secondary text-black text-justify">
                REGISTRAR EMPLEADO
            </div>
            <br>
            <div class="card-body">
                <form id="insertar_empleado">
                    <div class="row md-12">


                        <div class="form-group col-md-4">
                            <label for="">Documento</label>
                            <input type="text" class="form-control" name="emp_documento" id="emp_documento">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Codigo</label>
                            <input type="text" class="form-control" name="emp_codigo" id="emp_codigo">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Nombre 1</label>
                            <input type="text" class="form-control" name="emp_nombre1" id="emp_nombre1">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Nombre 2</label>
                            <input type="text" class="form-control" name="emp_nombre2" id="emp_nombre2">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Apellido 1</label>
                            <input type="text" class="form-control" name="emp_apellido1" id="emp_apellido1">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Apellido 2</label>
                            <input type="text" class="form-control" name="emp_apellido2" id="emp_apellido2">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Direccion</label>
                            <input type="text" class="form-control" name="emp_direccion" id="emp_direccion">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Sexo:</label>
                            <select class="form-select" name="emp_sexo" id="emp_sexo" required>
                                <option value="">Seleccione...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Celular</label>
                            <input type="text" class="form-control" name="emp_celular" id="emp_celular">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="emp_email" id="emp_email">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Tipo de Usuario:</label>
                            <select class="form-select" name="tipo_id" id="tipo_id" required>
                                <option value="">Seleccione...</option>
                                <?php
                                if ($array_rol) {
                                    foreach ($array_rol as $object_rol) {
                                        $tipo_id = $object_rol->tipo_id;
                                        $tipo_nombre = $object_rol->tipo_nombre;
                                ?>
                                        <option value="<?= $tipo_id ?>"><?= $tipo_nombre ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-info float-right" onclick="Empleado.insertEmpleado()">
                                <i class=""> Guardar</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-secondary text-black text-justify">
                LISTAR EMPLEADOS
            </div>
            <div class="card-body">
                <br>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-justify">
                                <th>DOCUMENTO</th>
                                <th>Codigo</th>
                                <th>Nombre 1</th>
                                <th>Nombre 2</th>
                                <th>Apellido 1</th>
                                <th>Apellido 2</th>
                                <th>Direccion</th>
                                <th>Sexo</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Tipo de Usuario</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array_empleado as $object_empleado) {
                                $emp_documento = $object_empleado->emp_documento;
                                $emp_codigo = $object_empleado->emp_codigo;
                                $emp_nombre1 = $object_empleado->emp_nombre1;
                                $emp_nombre2 = $object_empleado->emp_nombre2;
                                $emp_apellido1 = $object_empleado->emp_apellido1;
                                $emp_apellido2 = $object_empleado->emp_apellido2;
                                $emp_direccion = $object_empleado->emp_direccion;
                                $emp_sexo = $object_empleado->emp_sexo;
                                $emp_celular = $object_empleado->emp_celular;
                                $emp_email = $object_empleado->emp_email;
                                $tipo_id = $object_empleado->tipo_nombre;
                            ?>
                                <tr class="text-justify">
                                    <td><?= $emp_documento; ?></td>
                                    <td><?= $emp_codigo; ?></td>
                                    <td><?= $emp_nombre1 ?></td>
                                    <td><?= $emp_nombre2 ?></td>
                                    <td><?= $emp_apellido1 ?></td>
                                    <td><?= $emp_apellido2 ?></td>
                                    <td><?= $emp_direccion ?></td>
                                    <td><?= $emp_sexo ?></td>
                                    <td><?= $emp_celular ?></td>
                                    <td><?= $emp_email ?></td>
                                    <td><?= $tipo_id ?></td>
                                    <td style="text-align: center;">
                                        <i class="bi bi-pencil-fill" onclick="Empleado.showEmpleado('<?= $emp_documento ?>')"></i>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    <?php
    }
    function showEmpleado($array_empleado, $array_rol)
    {
        $emp_documento = $array_empleado[0]->emp_documento;
        $emp_codigo = $array_empleado[0]->emp_codigo;
        $emp_nombre1 = $array_empleado[0]->emp_nombre1;
        $emp_nombre2 = $array_empleado[0]->emp_nombre2;
        $emp_apellido1 = $array_empleado[0]->emp_apellido1;
        $emp_apellido2 = $array_empleado[0]->emp_apellido2;
        $emp_direccion = $array_empleado[0]->emp_direccion;
        $emp_sexo = $array_empleado[0]->emp_sexo;
        $emp_celular = $array_empleado[0]->emp_celular;
        $emp_email = $array_empleado[0]->emp_email;
        $tipo_id = $array_empleado[0]->tipo_nombre;

    ?>
        <div class="card">
            <div class="car-body">
                <form action="" id="update_empleado">
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="">Documento</label>
                            <input type="text" class="form-control" name="emp_documento" id="emp_documento" value="<?= $emp_documento ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Codigo</label>
                            <input type="text" class="form-control" name="emp_codigo" id="emp_codigo" value="<?= $emp_codigo ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Nombre 1</label>
                            <input type="text" class="form-control" name="emp_nombre1" id="emp_nombre1" value="<?= $emp_nombre1 ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Nombre 2</label>
                            <input type="text" class="form-control" name="emp_nombre2" id="emp_nombre2" value="<?= $emp_nombre2 ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Apellido 1</label>
                            <input type="text" class="form-control" name="emp_apellido1" id="emp_apellido1" value="<?= $emp_apellido1 ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Apellido 2</label>
                            <input type="text" class="form-control" name="emp_apellido2" id="emp_apellido2" value="<?= $emp_apellido2 ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Direccion</label>
                            <input type="text" class="form-control" name="emp_direccion" id="emp_direccion" value="<?= $emp_direccion ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Sexo:</label>
                            <select class="form-select" name="emp_sexo" id="emp_sexo" required>
                                <option value="<?= $emp_sexo ?>"><?= $emp_sexo ?></option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Celular</label>
                            <input type="text" class="form-control" name="emp_celular" id="emp_celular" value="<?= $emp_celular ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="emp_email" id="emp_email" value="<?= $emp_email ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Tipo de Usuario:</label>
                            <select class="form-select" name="tipo_id" id="tipo_id" required>
                                <option value="">Seleccione...</option>
                                <?php
                                if ($array_rol) {
                                    foreach ($array_rol as $object_rol) {
                                        $tipo_id = $object_rol->tipo_id;
                                        $tipo_nombre = $object_rol->tipo_nombre;
                                ?>
                                        <option value="<?= $tipo_id ?>"><?= $tipo_nombre ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id" value="<?=$emp_documento?>">
                    <br>
                    <button type="button" class="btn btn-info" onclick="Empleado.updateEmpleado()">
                        <i class=""> Guardar</i>
                    </button>
                </form>
            </div>
        </div>
<?php
    }
}
