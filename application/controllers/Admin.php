<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Admin
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

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_admin();
        $this->load->model('Data_model', 'dmod');
        $this->load->model('Form_model', 'form');
    }

    public function users()
    {
        $data = array(
            'title' => $this->config->item('title'),
            'file' => 'admin/users',
            'page' => 'Management User',
            'user' => userdetail($this->session->userdata('id'))
        );

        $this->load->view('template', $data);
    }
    public function datausers()
    {
        if (empty($this->session->userdata('id'))) {
            show_404();
        } else {
            echo json_decode($this->dmod->userdata());
        }
    }
    public function doadd_user()
    {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post();
            $data = array(
                'nama' => $post['nama'],
                'email' => $post['email'],
                'password' => $post['password'],
                'admin' => $post['admin']
            );
            $aksi = $this->form->add_user($data);
            header('Content-Type: application/json');
            echo json_encode($aksi);
        } else {
            show_404();
        }
    }
    public function duser()
    {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post();
            $data = array('id' => $post['id']);
            $aksi = $this->dmod->duser($data);
            header('Content-Type: application/json');
            echo json_encode($aksi);
        } else {
            show_404();
        }
    }
    public function doedit_user()
    {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post();
            $data = array(
                'id' => $post['id'],
                'nama' => $post['nama'],
                'email' => $post['email'],
                'password' => $post['password'],
                'admin' => $post['admin'],
                'banned' => $post['banned']
            );
            $aksi = $this->form->edit_user($data);
            header('Content-Type: application/json');
            echo json_encode($aksi);
        } else {
            show_404();
        }
    }
    public function dohapus_user()
    {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post();
            $data = array(
                'id' => $post['id'],
            );
            $aksi = $this->form->hapus_user($data);
            header('Content-Type: application/json');
            echo json_encode($aksi);
        } else {
            show_404();
        }
    }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */