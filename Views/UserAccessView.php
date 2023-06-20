<?php
class UserAccessView
{
    function paginateUserAccess($array_user_access)
    {
?>
        <div class="card">
        <div class="card-header bg-secondary text-black text-justify">
                REGISTRAR UN USUARIO DE ACCESO
            </div>
        </div>
        <br>
        <div class="card-body">
            <form action="" id="insert_user_access">
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">DOCUMENTO</label>
                        <input type="text" class="form-control" name="emp_documento" id="emp_documento" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">NOMBRE COMPLETO</label>
                        <input type="text" class="form-control" name="emp_nombre" id="emp_nombre" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">EMAIL</label>
                        <input type="text" class="form-control" name="emp_email" id="emp_email" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">TELEFONO</label>
                        <input type="text" class="form-control" name="emp_telefono" id="emp_telefono" required>
                    </div>

                    <div class="form-group col-md-6">
                            <label for="">TIPO EMPLEADO</label>
                            <select class="form-select" name="emp_tipo" id="emp_tipo" required>
                            <option value="">SELECIONE...</option>
                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                <option value="VENDEDOR">VENDEDOR</option>
                                <option value="MANAGER">MANAGER</option>
                            </select>
                        </div>
                    
                    <div class="form-group col-md-6">
                        <label for="">DIRECCION</label>
                        <input type="text" class="form-control" name="emp_direccion" id="emp_direccion">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">USUARIO</label>
                        <input type="text" class="form-control" name="acce_usuario" id="acce_usuario" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">CONTRASEÑA</label>
                        <input type="text" class="form-control" name="acce_contrasena" id="acce_contrasena" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">REPETIR CONTRASEÑA</label>
                        <input type="text" class="form-control" name="acce_contrasena1" id="acce_contrasena1" required>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-info float-right" onclick="UserAccess.insertUserAccess()">
                            <i> Guardar</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <div class="card">
        <div class="card-header bg-secondary text-black text-justify">
                LISTAR USUARIOS DE ACCESO
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>NOMBRE COMPLETO</th>
                                <th>DOCUMENTO</th>
                                <th>TIPO EMPLEADO</th>
                                <th>USUARIO</th>
                                <th>CONTRASEÑA</th>
                                <th style="text-align:center;">Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($array_user_access as $objec_user_access) {
                                $i++;
                                $nombre = $objec_user_access->emp_name;
                                $emp_documento = $objec_user_access->emp_document;
                                $tipo = $objec_user_access->emp_type;
                                $acce_usuario = $objec_user_access->access->username;
                                $acce_contrasena = $objec_user_access->access->password;
                            ?>
                                <tr class="text-center">
                                    <td><?= $i ?></td>
                                    <td><?= $nombre ?></td>
                                    <td><?= $emp_documento ?></td>
                                    <td><?= $tipo ?></td>
                                    <td><?= $acce_usuario ?></td>
                                    <td><?= $acce_contrasena ?></td>
                                    <td style="text-align: center;">
                                        <i class="bi bi-eraser-fill" onclick="UserAccess.showUserAccess('<?= $emp_documento ?>')"></i>
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
    function showUserAccess($array_user_access)
    {
        $emp_documento = $array_user_access[0]->emp_documento;
        $acce_usuario = $array_user_access[0]->acce_usuario;
        $acce_contrasena = $array_user_access[0]->acce_contrasena;
    ?>
        <div class="card">
            <div class="card-body">
                <form action="" id="update_user_access">
                    <div class="row ">

                        <div class="form-group col-md-4">
                            <label for="">Documento</label>
                            <input type="number" class="form-control" name="emp_documento" id="emp_documento" value="<?= $emp_documento ?>" required>
                            <input type="hidden" class="form-control" name="emp_documento1" id="emp_documento1" value="<?= $emp_documento ?>" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">USUARIO</label>
                            <input type="text" class="form-control" name="acce_usuario" id="acce_usuario" value="<?= $acce_usuario ?>" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">CONTRASEÑA</label>
                            <input type="text" class="form-control" name="acce_contrasena" id="acce_contrasena" value="<?= $acce_contrasena ?>" required>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <input type="hidden" id="id" name="id" value="<?= $emp_documento ?>">
                        <br>
                        <button type="button" class="btn btn-primary" onclick="UserAccess.updateUserAccess()">
                            <i class="bi bi-check-square">Guardar</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
<?php
    }
}
