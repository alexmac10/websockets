<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Validar_controll extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('validar_model', 'consulta');
    }

    public function validarAcceso() {
        $usuario = $this->input->post('usuario');
        $password = $this->input->post('psw');
        $data['resultado'] = $this->consulta->getUsuario($usuario, $password);

        if ($data['resultado'] === 0) {
            $data['error'] = ' no existe el usuario';
            $this->load->view('login', $data);
        } else {
            foreach ($data['resultado'] as $value) {
                $user = $value['nombre'];
            }
            session_start();
            $_SESSION['user'] = $user;
            $data['user'] = $user;
            $this->load->view('dashboard', $data);
        }
    }

}
