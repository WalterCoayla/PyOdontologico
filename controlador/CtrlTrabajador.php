<?php
require_once './core/Controlador.php';
require_once './modelo/Trabajador.php';
class CtrlTrabajador extends Controlador{
    public function index(){
        echo "Hola trabajador";
    }
    public function validar(){
        echo "Validando ingreso....";
        
        $obj= new Trabajador();
        $data = $obj->validar($_GET['id']);

        if ($data['data']==null){
            echo "Trabajador no encontrado";
        }else {
            $this->mostrarDashboard();
        }
        
    }
    public function mostrarDashboard(){
        $this->mostrar('trabajadores/principal.php');
    }
}