<?php
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
            var_dump($data['data']);
            header('location: ?ctrl=CtrlTrabajador&accion=validar&id='.$data['data'][0]['idpersonas']);
        }
        
    }
}