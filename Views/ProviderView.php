<?php
class ProviderView
{
    function paginateProvider($array_provider)
    {
?>
        <div class="card">
            <div class="card-header text-center bg-secondary text-black">
                Registrar Proveedor
            </div>
            <br>
            <div class="card-body">
                <form action="" id="insert_proveedor">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">NIT:</label>
                            <input type="text" class="form-control" name="nit" id="nit" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">NOMBRE:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">DIRECCION:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">CELULAR:</label>
                            <input type="text" class="form-control" name="celular" id="celular" required>
                        </div>

                    </div>
                    <br>
                    <div class=" row">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-info float-right" onclick="Provider.insertProvider()">
                                <i class=""> Guardar</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-center bg-secondary text-black">
                Lista de Proveedores
            </div>
            <div class="card-body">
                <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-justify">
                                <th>NIT</th>
                                <th>NOMBRE</th>
                                <th>DIRECCION</th>
                                <th>CELULAR</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array_provider as $object_provider) {
                                $nit = $object_provider->nit;
                                $nombre = $object_provider->nombre;
                                $direccion = $object_provider->direccion;
                                $celular = $object_provider->telefono;
                            ?>
                                <tr class="text-justify">
                                    <td><?= $nit ?></td>
                                    <td><?= $nombre ?></td>
                                    <td><?= $direccion ?></td>
                                    <td><?= $celular ?></td>
                                    <td style="text-align: center;">
                                        <i class="bi bi-pencil-fill" onclick="Provider.showProvider('<?= $nit ?>')"></i>
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
    function showProvider($array_provider)
    {
        $nit = $array_provider->nit;
        $nombre = $array_provider->nombre;
        $direccion = $array_provider->direccion;
        $celular = $array_provider->telefono;
    ?>
        <div class="card">
            <div class="card-body">
                <form action="" id="update_provider">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">NIT:</label>
                            <input type="text" class="form-control" name="nit" id="nit" value="<?= $nit ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">NOMBRE:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $nombre ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">DIRECCION:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" value="<?= $direccion ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">CELULAR:</label>
                            <input type="text" class="form-control" name="celular" id="celular" value="<?= $celular ?>" required>
                        </div>

                    </div>
                    <input type="hidden" id="id" name="id" value="<?= $nit; ?>">
                    <br>
                    <button type="button" class="btn btn-primary" onclick="Provider.updateProvider()">
                        <i class="bi bi-check-square"> Guardar</i>
                    </button>
                </form>
            </div>
        </div>
<?php
    }
}
