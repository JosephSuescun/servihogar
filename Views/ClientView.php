<?php

class ClientView
{
    function paginateClient($array_client)
    {

?>
        <div class="card">
            <div class="card-header bg-secondary text-black text-justify">
                REGISTRAR UN CLIENTE
            </div>
            <div class="card-body">
                <form action="" id="inser_client">
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="">DOCUMENTO</label>
                            <input type="text" class="form-control" name="clie_documento" id="clie_documento" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">NOMBRE 1</label>
                            <input type="text" class="form-control" name="clie_nombre1" id="clie_nombre1" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">NOMBRE 2</label>
                            <input type="text" class="form-control" name="clie_nombre2" id="clie_nombre2" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">APELLIDO 1</label>
                            <input type="text" class="form-control" name="clie_apellido1" id="clie_apellido1" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">APELLIDO 2</label>
                            <input type="text" class="form-control" name="clie_apellido2" id="clie_apellido2" required>
                        </div>

                        <!--<div class="form-group col-md-6">
                            <label for="">PAIS</label>
                            <select class="form-select" name="clie_pais" id="clie_pais" onchange="Client.Pais(this.value)">
                                <option value="">Seleccione...</option>
                                <?php
                               /* if ($array_pais) {
                                    foreach ($array_pais as $object_pais) {
                                        $cod_pais = $object_pais->cod_pais;
                                        $nombre_pais = $object_pais->nombre_pais;
                                ?>
                                        <option value="<?= $cod_pais ?>"><?= $nombre_pais ?></option>
                                <?php
                                    }
                                }*/
                                ?>
                            </select>
                        </div>-->

                        <div class="form-group col-md-4">
                            <label for="">DIRECCION</label>
                            <input type="text" class="form-control" name="clie_direccion" id="clie_direccion" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">SEXO</label>
                            <select class="form-select" name="clie_sexo" id="clie_sexo" required>
                                <option value="">Seleccione...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="I">Indefinido</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">CELULAR</label>
                            <input type="text" class="form-control" name="clie_celular" id="clie_celular" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">EMAIL</label>
                            <input type="text" class="form-control" name="clie_email" id="clie_email" required>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-primary float-right" onclick="Client.insertClient()">
                                <i> Guardar</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-secondary text-black text-justify">
                LISTAR CLIENTES
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-justify">
                                <th>DOCUMENTO</th>
                                <th>NOMBRE 1</th>
                                <th>NOMBRE 2</th>
                                <th>APELLIDO 1</th>
                                <th>APELLIDO 2</th>
                                <th>DIRECCION</th>
                                <th>SEXO</th>
                                <th>CELULAR</th>
                                <th>EMAIL</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array_client as $object_client) {
                                $clie_documento = $object_client->documento;
                                $clie_nombre1 = $object_client->nombre1;
                                $clie_nombre2 = $object_client->nombre2;
                                $clie_apellido1 = $object_client->apellido1;
                                $clie_apellido2 = $object_client->apellido2;
                                $clie_direccion = $object_client->direccion;
                                $clie_sexo = $object_client->sexo;
                                $clie_celular = $object_client->telefono;
                                $clie_email = $object_client->correo;
                            ?>
                                <tr class="text-justify">
                                    <td><?= $clie_documento ?></td>
                                    <td><?= $clie_nombre1 ?></td>
                                    <td><?= $clie_nombre2 ?></td>
                                    <td><?= $clie_apellido1 ?></td>
                                    <td><?= $clie_apellido2 ?></td>
                                    <td><?= $clie_direccion ?></td>
                                    <td><?= $clie_sexo ?></td>
                                    <td><?= $clie_celular ?></td>
                                    <td><?= $clie_email ?></td>
                                    <td style="text-align: center;">
                                        <i class="bi bi-pencil-fill" onclick="Client.showClient('<?= $clie_documento ?>')"></i>
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
    function showClient($array_client)
    {
        $clie_documento = $array_client->documento;
        $clie_nombre1 = $array_client->nombre1;
        $clie_nombre2 = $array_client->nombre2;
        $clie_apellido1 = $array_client->apellido1;
        $clie_apellido2 = $array_client->apellido2;
        $clie_direccion = $array_client->direccion;
        $clie_sexo = $array_client->sexo;
        $clie_celular = $array_client->telefono;
        $clie_email = $array_client->correo;
    ?>
        <div class="card">
            <div class="card-body">
                <form action="" id="update_client">
                    <div class="row">


                        <div class="form-group col-md-6">
                            <label for="">DOCUMENTO</label>
                            <input type="text" class="form-control" name="clie_documento" id="clie_documento" value="<?= $clie_documento ?>" required readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">NOMBRE 1</label>
                            <input type="text" class="form-control" name="clie_nombre1" id="clie_nombre1" value="<?= $clie_nombre1 ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">NOMBRE 2</label>
                            <input type="text" class="form-control" name="clie_nombre2" id="clie_nombre2" value="<?= $clie_nombre2 ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">APELLIDO 1</label>
                            <input type="text" class="form-control" name="clie_apellido1" id="clie_apellido1" value="<?= $clie_apellido1 ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">APELLIDO 2</label>
                            <input type="text" class="form-control" name="clie_apellido2" id="clie_apellido2" value="<?= $clie_apellido2 ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">DIRECCION</label>
                            <input type="text" class="form-control" name="clie_direccion" id="clie_direccion" value="<?= $clie_direccion ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">SEXO</label>
                            <select class="form-select" name="clie_sexo" id="clie_sexo" required>
                                <option value="<?= $clie_sexo ?>"><?= $clie_sexo ?></option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="I">Indefinido</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">CELULAR</label>
                            <input type="text" class="form-control" name="clie_celular" id="clie_celular" value="<?= $clie_celular ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">EMAIL</label>
                            <input type="text" class="form-control" name="clie_email" id="clie_email" value="<?= $clie_email ?>" required>
                        </div>


                    </div>
                    <div class="col-md-12">
                        <input type="hidden" id="id" name="id" value="<?= $clie_documento ?>">
                        <br>
                        <button type="button" class="btn btn-primary" onclick="Client.updateClient()">
                            <i class="bi bi-check-square">Guardar</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
<?php
    }
}
