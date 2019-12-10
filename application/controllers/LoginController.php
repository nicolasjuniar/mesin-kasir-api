<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $models = array(
            'UserModel' => 'UserModel',
        );
        $this->load->model($models);
    }

    public function login()
    {
        $user = json_decode(file_get_contents('php://input'), true);
        $user['password'] = md5($user['password']);
        $login = $this->UserModel->getUser($user);
        if ($login != null) {
            $response = array(
                'user' => $this->UserModel->getUser($user),
                'message' => 'Sukses melakukan login'
            );
            $code = 200;
        } else {
            $response = array(
                'message' => 'Username atau password'
            );
            $code = 401;
        }

        $this->output
            ->set_status_header($code)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }
}
