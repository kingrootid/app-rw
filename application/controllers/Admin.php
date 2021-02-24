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
  }

  public function users()
  {
    $data = array(
      'title' => $this->config->item('title'),
      'file' => 'admin/users',
      'page' => 'Home Page',
      'user' => userdetail($this->session->userdata('id'))
    );

    $this->load->view('template', $data);
  }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */