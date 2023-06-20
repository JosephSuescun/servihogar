<?php
class ProductModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listProduct()
    {
        try {
            $connection = new Connection();
            $result = $connection->query("products");

            $documents = [];

            foreach ($result as $document) {
                $documents[] = $document;
            }

            if(is_null($documents)){
                exit("SIN DATOS");
            }

            return $documents;
            
        } catch (Exception $e) {
            printf($e->getMessage());
        }
    }

    function insertProduct($cod_producto, $prod_nombre, $prod_descripcion, $valor, $stock)
    {
        $connection = new Connection();

        $json = json_encode([
            'cod_product'=>"$cod_producto",
            'name_product' =>"$prod_nombre",
            'price' =>"$valor",
            'description' =>"$prod_descripcion",
            'stock' =>"$stock",
        ]);

        $connection->queryCreate("products",json_decode($json));
    }

    function selectProduct($cod_producto)
    {
        try {
            $connection = new Connection();

            $filtro =[
                '_id' => new MongoDB\BSON\ObjectId($cod_producto)
            ];

            $result = $connection->query("products",$filtro);

            foreach($result AS $document){
                $salida = json_encode($document->jsonSerialize());
            }

            if(is_null($salida)){
                exit("SIN DATOS");
            }

            return $salida;
            
        } catch (Exception $e) {
            printf($e->getMessage());
        }
    }

    function updateProduct($cod_producto, $prod_nombre, $prod_descripcion, $valor, $stock)
    {
        $connection = new Connection();

        $primary = [
            'cod_product' => "$cod_producto"
        ];

        $actualizar = [
            '$set'=>[
                'cod_product'=>"$cod_producto",
                'name_product'=>"$prod_nombre",
                'price'=>"$valor",
                'description'=>"$prod_descripcion",
                'stock'=>"$stock",
            ]
        ];

        $connection->queryUpdate("products",$primary,$actualizar);
    }

    function consultProduct($cod_producto){
        $sql = "SELECT * FROM distribuidora.producto WHERE cod_producto = '$cod_producto'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}
