<?php
class AccessModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function validateFormSession($email,$password)
    {
        try {
            $connection = new Connection();

            $filtro =[
                'access.username'=>"$email",
                'access.password'=>"$password"
            ];

            $result = $connection->query("employees",$filtro);

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


}
?>