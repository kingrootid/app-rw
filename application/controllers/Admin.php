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
    public function product()
    {
        $data = array(
            'title' => $this->config->item('title'),
            'file' => 'admin/product',
            'page' => 'Management Product',
            'user' => userdetail($this->session->userdata('id'))
        );

        $this->load->view('template', $data);
    }
    public function dataproduct()
    {
        if (empty($this->session->userdata('id'))) {
            show_404();
        } else {
            echo json_decode($this->dmod->product());
        }
    }
    public function doadd_product()
    {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post();
            $data = array(
                'nama' => $post['nama'],
            );
            $aksi = $this->form->add_product($data);
            header('Content-Type: application/json');
            echo json_encode($aksi);
        } else {
            show_404();
        }
    }
    public function dproduct()
    {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post();
            $data = array('id' => $post['id']);
            $aksi = $this->dmod->dproduct($data);
            header('Content-Type: application/json');
            echo json_encode($aksi);
        } else {
            show_404();
        }
    }
    public function doedit_product()
    {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post();
            $data = array(
                'id' => $post['id'],
                'nama' => $post['nama'],
                'aktif' => $post['aktif']
            );
            $aksi = $this->form->edit_product($data);
            header('Content-Type: application/json');
            echo json_encode($aksi);
        } else {
            show_404();
        }
    }
    public function dohapus_product()
    {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post();
            $data = array(
                'id' => $post['id'],
            );
            $aksi = $this->form->hapus_product($data);
            header('Content-Type: application/json');
            echo json_encode($aksi);
        } else {
            show_404();
        }
    }
    public function rewards()
    {
        $data = array(
            'title' => $this->config->item('title'),
            'file' => 'admin/rewards/index',
            'page' => 'Management Hadiah',
            'user' => userdetail($this->session->userdata('id'))
        );

        $this->load->view('template', $data);
    }
    public function datarewards()
    {
        if (empty($this->session->userdata('id'))) {
            show_404();
        } else {
            echo json_decode($this->dmod->rewards());
        }
    }
    public function add_rewards()
    {
        $data = array(
            'title' => $this->config->item('title'),
            'file' => 'admin/rewards/add',
            'page' => 'Tambah Hadiah',
            'user' => userdetail($this->session->userdata('id'))
        );

        $this->load->view('template', $data);
    }
    public function doadd_rewards()
    {
        $post = $this->input->post();
        $data = array(
            'nama' => $post['nama'],
            'file' => $_FILES['file'],
            'min' => $post['min']
        );
        $aksi = $this->form->add_rewards($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', "
            <div class='card bg-danger text-white shadow'>
                <div class='card-body'>
                    GAGAL
                    <p>" . $aksi['message'] . "</p>
                </div>
            </div>");
            redirect('admin/add_rewards');
        } else {
            $this->session->set_flashdata('message', "
            <div class='card bg-success text-white shadow'>
                <div class='card-body'>
                    BERHASIL
                    <p>" . $aksi['message'] . "</p>
                </div>
            </div>");
            redirect('admin/add_rewards');
        }
    }
    public function edit_rewards()
    {
        if (empty($this->uri->segment(3))) {
            redirect('admin/rewards');
        } else {
            $data = array(
                'title' => $this->config->item('title'),
                'file' => 'admin/rewards/edit',
                'page' => 'Edit Hadiah',
                'user' => userdetail($this->session->userdata('id')),
                'rewards' => $this->db->get_where('rewards', ['id' => $this->uri->segment(3)])->row_array()
            );

            $this->load->view('template', $data);
        }
    }
    public function doedit_rewards()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post['id'],
            'nama' => $post['nama'],
            'file' => $_FILES['file'],
            'min' => $post['min']
        );
        $aksi = $this->form->edit_rewards($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', "
            <div class='card bg-danger text-white shadow'>
                <div class='card-body'>
                    GAGAL
                    <p>" . $aksi['message'] . "</p>
                </div>
            </div>");
            redirect("admin/edit_rewards/" . $data['id'] . "");
        } else {
            $this->session->set_flashdata('message', "
            <div class='card bg-success text-white shadow'>
                <div class='card-body'>
                    BERHASIL
                    <p>" . $aksi['message'] . "</p>
                </div>
            </div>");
            redirect("admin/edit_rewards/" . $data['id'] . "");
        }
    }
    public function hapus_rewards()
    {
        if (empty($this->uri->segment(3))) {
            redirect('admin/rewards');
        } else {
            $data = array(
                'title' => $this->config->item('title'),
                'file' => 'admin/rewards/hapus',
                'page' => 'Hapus Hadiah',
                'user' => userdetail($this->session->userdata('id')),
                'rewards' => $this->db->get_where('rewards', ['id' => $this->uri->segment(3)])->row_array()
            );

            $this->load->view('template', $data);
        }
    }
    public function dohapus_rewards()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post['id'],
            'nama' => $post['nama'],
            'file' => $_FILES['file'],
            'min' => $post['min']
        );
        $aksi = $this->form->hapus_rewards($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', "
            <div class='card bg-danger text-white shadow'>
                <div class='card-body'>
                    GAGAL
                    <p>" . $aksi['message'] . "</p>
                </div>
            </div>");
            redirect("admin/hapus_rewards/" . $data['id'] . "");
        } else {
            $this->session->set_flashdata('message', "
            <div class='card bg-success text-white shadow'>
                <div class='card-body'>
                    BERHASIL
                    <p>" . $aksi['message'] . "</p>
                </div>
            </div>");
            redirect("admin/rewards");
        }
    }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */