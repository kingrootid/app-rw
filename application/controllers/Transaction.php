<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Transaction
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

class Transaction extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_loggin();
        $this->load->model('Form_model', 'form');
    }

    public function index()
    {
        $this->new();
    }
    public function new()
    {
        $data = array(
            'title' => $this->config->item('title'),
            'file' => 'transaction/new',
            'page' => 'New Transaction',
            'user' => userdetail($this->session->userdata('id')),
            'product' => $this->db->where('is_active', 1)->order_by('sisa_product DESC')->get('product')->result_array()
        );

        $this->load->view('template', $data);
    }
    public function donew()
    {
        $post = $this->input->post();
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'prod_id' => $post['prod_id'],
            'qty' => $post['qty']
        );
        $aksi = $this->form->donew($data);
        if ($aksi['error'] == TRUE) {
            $this->session->set_flashdata('message', "
            <div class='card bg-danger text-white shadow'>
                <div class='card-body'>
                    GAGAL
                    <p>" . $aksi['message'] . "</p>
                </div>
            </div>");
            redirect('transaction/new');
        } else {
            $this->session->set_flashdata('message', "
            <div class='card bg-success text-white shadow'>
                <div class='card-body'>
                    BERHASIL
                    <p>" . $aksi['message'] . "</p>
                </div>
            </div>");
            redirect('transaction/new');
        }
    }
}


/* End of file Transaction.php */
/* Location: ./application/controllers/Transaction.php */