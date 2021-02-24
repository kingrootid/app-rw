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
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */