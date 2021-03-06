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
    
    function setNotificacion($usuario) {
        $datos = array(
            'id' => null,
            'autor' => $usuario,
            'usuario' => 'alex',
            'revisada' => 'no',
            'confirmacion' => 'no',
            'detalle' => 'ingreso',
            'url' => 'http://localhost/websockets/pruebaCodeigniter/'
        );
        
        $this->db->insert('notificaciones',$datos); 
    }
    
}