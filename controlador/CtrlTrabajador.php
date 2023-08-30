<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Trabajador.php';
class CtrlTrabajador extends Controlador{
    public function index(){
        echo "Hola trabajador";
    }
    public function validar(){
        # echo "Validando ingreso....";
        $this->verificarLogin();
        $obj= new Trabajador();
        $data = $obj->validar($_GET['id']);

        if ($data['data']==null){
            # echo "Trabajador no encontrado";
            $this->mostrarDashboardCliente();

        }else {
            $_SESSION['tipo']= $data['data'][0]['tipo'];
            $_SESSION['id']= $data['data'][0]['idpersonas'];
            $this->mostrarDashboard();
        }
        
    }
    public function mostrarDashboard(){
        # $contenido = $this->mostrar('plantilla/home.php','',true);
        $_SESSION['menu']=$this->getMenuTrabajador();

        $data = [
            
            'titulo'=>'Sistema Odontológico',
            'contenido'=>$this->mostrar('plantilla/home.php','',true)
        ];
        $this->mostrar('template.php',$data);
    }
    public function mostrarDashboardCliente(){
        # $contenido = $this->mostrar('plantilla/home.php','',true);
        $_SESSION['menu']=[
            'CtrlCitas'=>'Separar Cita',
            'CtrlHistoriaClinica'=>'Ver Historia Clin.',
        ];

        $data = [
            
            'titulo'=>'Sistema Odontológico',
            'contenido'=>$this->mostrar('plantilla/home.php','',true)
        ];
        $this->mostrar('template.php',$data);
    }
    private function getMenuTrabajador(){
        $tipo = isset($_SESSION['tipo'])?$_SESSION['tipo']:'';
        switch ($tipo) {
            case 'DOCTOR':
                $menu=[
                    
                    "CtrlPersona"=>"Personas",

                    ];
                break;
            
            default:    # Para el ADMINISTRADOR
                $menu=[
                    # "CtrlPrincipal"=>"Inicio",
                    "CtrlEstado"=>"Estados",
                    "CtrlPersona"=>"Personas",

                    ];
                break;
                
        }
        return $menu;
    }
    private function verificarLogin(){
        if (!isset($_SESSION['usuario'])){
            header("Location: ?");
            exit();
        }
    }
}