<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Auth_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Auth_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function login($post)
    {
        if (empty($post['email']) || empty($post['password'])) {
            return array('error' => true, 'message' => 'Data input tidak ada');
        } else {
            $cek = $this->db->get_where('users', ['email' => $post['email'], 'banned' => 0]);
            $data = $cek->row_array();
            if ($cek->num_rows() < 1) {
                return array('error' => true, 'message' => 'Data akun tidak ditemukan');
            } else if (password_verify($post['password'], $data['password']) == false) {
                return array('error' => true, 'message' => 'Email / Password tidak sesuai');
            } else {
                return array('error' => false, 'message' => 'Berhasil login', 'id' => $data['id']);
            }
        }
    }

    // ------------------------------------------------------------------------

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */