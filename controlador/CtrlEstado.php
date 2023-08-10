<?php
require_once './core/Controlador.php';
require_once './modelo/Estado.php';
class CtrlEstado extends Controlador
{
    public function index(){

        $this->listar();

    }
    public function editar(){
        
        $id = $_GET['id'];
        # echo "Editando....".$id;
        $obj= new Estado();

        $miObj = $obj->getBy('id',$id);
        # var_dump($miObj);exit;
        $datos = array(
            'cargo'=>$miObj['data'][0]
        );
        # var_dump($datos);exit;
        $this->mostrar('estados/formulario.php',$datos);
    }
    public function guardar(){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];

        $obj= new Cargo($id, $nombre,$descripcion);

        if ($id==''){
            $respuesta = $obj->nuevo();
        } else {    # Editar
            $respuesta = $obj->editar();
        }
        
        $this->listar();
    }
    public function nuevo(){
        $this->mostrar('estados/formulario.php');
    }

    public function eliminar(){

        $id = $_GET['id'];
        $obj= new Cargo($id);

        $respuesta = $obj->eliminar();

        $this->listar();

    }

    public function listar(){

        $obj= new Estado();

        $data = $obj->listar();
        
        $datos = array(
            'data'=>$data['data']
        );

        $this->mostrar('estados/mostrar.php',$datos);

    }
}