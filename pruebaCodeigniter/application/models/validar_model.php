<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Validar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    function getUsuario($usuario, $password) {
        $datos = array('nombre' => $usuario,'contraseña' => $password);
        $query = $this->db->get_where('usuarios',$datos);
        
        if($query->num_rows() > 0 ){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
}