<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Auth
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
    }

    public function index()
    {
        is_loggin();
    }
    public function login()
    {
        $data = array(
            'title' => $this->config->item('title'),
            'page' => 'Home Page',
        );

        $this->load->view('auth/login', $data);
    }
    public function do_login()
    {
        $post = $this->input->post();
        $data = array(
            'email' => $post['email'],
            'password' => $post['password']
        );
        $aksi = $this->auth->login($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', "
            <div class='card bg-danger text-white shadow'>
                <div class='card-body'>
                    GAGAL
                    <p>" . $aksi['message'] . "</p>
                </div>
            </div>");
            redirect('auth/login');
        } else {
            $this->session->set_userdata(array('id' => $aksi['id']));
            $this->session->set_flashdata('message', "
            <div class='card bg-success text-white shadow'>
                <div class='card-body'>
                    BERHASIL
                    <p>" . $aksi['message'] . "</p>
                </div>
            </div>");
            redirect('');
        }
    }
    public function logout()
    {
        session_destroy();
        redirect();
    }
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */