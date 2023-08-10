<?php
require_once './core/Modelo.php';
class Persona extends Modelo{
    private $_id;
    private $_nombre;
    private $_apellido;
    private $_email;
    private $_clave;

    private $_tabla = 'personas';

    public function __construct($id=null, $nombre=null, $apellido=null, $email=null, $clave=null){
        $this->_id = $id;
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_email = $email;
        $this->_clave = $clave;

        parent::__construct($this->_tabla);

    }
    public function listar(){
        return $this->getAll();
    }
    public function eliminar(){
        # return $this->deleteBy('idestados',$this->_id);
    }

    public function nuevo(){
        $datos = array(
            "nombre"=>"'$this->_estado'"
        );
        return $this->insert($datos);
    }
    public function editar(){
        $datos = array(
            "nombre"=>"'$this->_estado'"
        );
        
        $wh = "idestados = $this->_id";

        return $this->update($wh, $datos);

    }
    public function validarLogin($usuario, $clave){
        $this->_sql->addWhere("`correo`='$usuario'");
        $this->_sql->addWhere("`clave`='$clave'");
        # echo $this->_sql;exit;
        return $this->_bd->ejecutar($this->_sql);
    }

}