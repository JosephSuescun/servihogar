<?php
require_once "Models/ProductModel.php";
require_once "Views/ProductView.php";

class ProductController
{
    function paginateProduct()
    {
        $Connection = new Connection('sel');
        $ProductModel = new ProductModel($Connection);
        $ProductView = new ProductView;

        $array_product = $ProductModel->listProduct();
        $ProductView->paginateProduct($array_product);
    }

    function insertProduct()
    {
        $Connection = new Connection('sel');
        $ProductModel = new ProductModel($Connection);
        $ProductView = new ProductView;

        $cod_producto = $_POST['cod_producto'];
        $prod_nombre = $_POST['prod_nombre'];
        $prod_descripcion = $_POST['prod_descripcion'];
        $valor = $_POST['valor'];
        $stock = $_POST['stock'];

        if (empty($cod_producto)) {
            $response = ["message" => 'FALTA POR LLENAR EL CODIGO DEL PRODUCTO'];
            exit(json_encode($response));
        }
        if (empty($prod_nombre)) {
            $response = ["message" => 'FALTA POR LLENAR EL NOMBRE'];
            exit(json_encode($response));
        }
        if (empty($prod_descripcion)) {
            $response = ["message" => 'FALTA POR LLENAR LA DESCRIPCION '];
            exit(json_encode($response));
        }
        if (empty($valor)) {
            $response = ["message" => 'FALTA POR LLENAR EL VALOR'];
            exit(json_encode($response));
        }
        if (empty($stock)) {
            $response = ["message" => 'FALTA POR LLENAR EL STOCK'];
            exit(json_encode($response));
        }
        
        /*$array_products = $ProductModel->consultProduct($cod_producto);
        if ($array_products) {
            $response = ["message" => 'CODIGO YA REGISTRADO'];
            exit(json_encode($response));
        }*/
        if ($valor<= 0) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR UN VALOR NEGATIVO O IGUAL A 0'];
            exit(json_encode($response));
        }
        if ($stock<= 0) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR UN VALOR NEGATIVO O IGUAL A 0'];
            exit(json_encode($response));
        }
        /*if ($entrada<= 0) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR UN VALOR NEGATIVO O IGUAL A 0'];
            exit(json_encode($response));
        }*/

        $ProductModel->insertProduct($cod_producto, $prod_nombre, $prod_descripcion, $valor, $stock);
        $array_product = $ProductModel->listProduct();
        $ProductView->paginateProduct($array_product);
    }

    function showProduct()
    {
        $Connection = new Connection('sel');
        $ProductModel = new ProductModel($Connection);
        $ProductView = new ProductView;

        $cod_producto = $_POST['id'];

        $array_product = json_decode($ProductModel->selectProduct($cod_producto));
        $ProductView->showProduct($array_product);
    }

    function updateProduct()
    {
        $Connection = new Connection('sel');
        $ProductModel = new ProductModel($Connection);
        $ProductView = new ProductView;

        $cod_producto = $_POST['cod_producto'];
        $prod_nombre = $_POST['prod_nombre'];
        $prod_descripcion = $_POST['prod_descripcion'];
        $valor = $_POST['valor'];
        $stock = $_POST['stock'];
        
        if (empty($prod_nombre)) {
            $response = ["message" => 'FALTA POR LLENAR EL NOMBRE'];
            exit(json_encode($response));
        }
        if (empty($prod_descripcion)) {
            $response = ["message" => 'FALTA POR LLENAR LA DESCRIPCION '];
            exit(json_encode($response));
        }
        if (empty($valor)) {
            $response = ["message" => 'FALTA POR LLENAR EL VALOR'];
            exit(json_encode($response));
        }
        if (empty($stock)) {
            $response = ["message" => 'FALTA POR LLENAR EL STOCK'];
            exit(json_encode($response));
        }
        if ($valor<= 0) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR UN VALOR NEGATIVO O IGUAL A 0'];
            exit(json_encode($response));
        }
        if ($stock<= 0) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR UN VALOR NEGATIVO O IGUAL A 0'];
            exit(json_encode($response));
        }

        $array_product = $ProductModel->updateProduct($cod_producto, $prod_nombre, $prod_descripcion, $valor, $stock);
        $array_product = $ProductModel->listProduct();
        $ProductView->paginateProduct($array_product);
    }
}
