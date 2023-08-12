<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Persona.php';
class CtrlPersona extends Controlador{
    public function index(){
        echo "Hola persona";
    }
    public function login(){
        echo "Validando ingreso....";
        
        $obj= new Persona();
        $data = $obj->validarLogin($_POST['email'],$_POST['clave']);
        if ($data['data']==null){
            echo "Usuario no encontrado";
        }else {
            # var_dump($data['data']);
            $_SESSION['usuario'] = $data['data'][0]['usuario'];
            $_SESSION['nombre'] = $data['data'][0]['nombre']. ' '. $data['data'][0]['apellido'];

            header('location: ?ctrl=CtrlTrabajador&accion=validar&id='.$data['data'][0]['idpersonas']);
        }
        
    }
    public function logout(){
        session_destroy();
        header('location: ?');

    }
}