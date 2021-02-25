<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Helpers Umum_helper
 *
 * This Helpers for ...
 * 
 * @package   CodeIgniter
 * @category  Helpers
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 *
 */

// ------------------------------------------------------------------------

if (!function_exists('test')) {
    /**
     * Test
     *
     * This test helpers
     *
     * @param   ...
     * @return  ...
     */
    function is_loggin()
    {
        $ci = &get_instance();
        if (empty($ci->session->userdata('id'))) {
            redirect('auth/login');
        }
    }
    function userdetail($id)
    {
        $ci = &get_instance();
        return $ci->db->get_where('users', ['id' => $id])->row_array();
    }
    function is_admin()
    {
        $ci = &get_instance();
        $cek = $ci->db->get_where('users', ['id' => $ci->session->userdata('id'), 'admin' => 1]);
        if ($cek->num_rows() == 0) {
            redirect();
        }
    }
}

// ------------------------------------------------------------------------

/* End of file Umum_helper.php */
/* Location: ./application/helpers/Umum_helper.php */