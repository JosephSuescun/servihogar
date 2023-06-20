<?php
require_once "Models/AccessModel.php";
require_once "Views/AccessView.php";

class AccessController
{
    function validateClient()
    {
        $AccesView = new AccessView();
        $AccesView->showFormSession();
    }

    function validateFormSession($array)
    {
        $Connection=new Connection('sel');
        $AccessModel=new AccessModel($Connection);
         
        $email=$array['usuario'];
        $password=$array['password'];

        $array_access=json_decode($AccessModel->validateFormSession($email,$password));
        print_r($array_access);
        $user = $array_access->access->username;
        $pass = $array_access->access->password;

        if(($email==$user)AND($password==$pass))
        {
            $_SESSION['acce_documento']=$array_access->emp_document;
            $_SESSION['auth']='OK';
            $_SESSION['acce_usuario']=$array_access->access->username;
        }
        header('Location: index.php');

    }

    function closeSession()
    {
        $response=array();
        
        session_unset();
        session_destroy();
        $_SESSION = array();
        $response['message']="Que tenga un buen día";
        exit(json_encode($response));
        
    }
}
