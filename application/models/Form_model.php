<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Form_model
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

class Form_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function add_user($post)
    {
        if (empty($post['nama']) || empty($post['email']) || empty($post['password']) || empty($post['admin'])) {
            return array('error' => true, 'message' => 'Data tidak ada');
        } else {
            if ($post['admin'] == "tdk") {
                $admin = 0;
            } else {
                $admin = 1;
            }
            $cek = $this->db->get_where('users', ['email' => $post['email']])->num_rows();
            if ($cek > 1) {
                return array('error' => true, 'message' => 'Email sudah terdaftar');
            } else {
                $data = array(
                    'nama' => $post['nama'],
                    'email' => $post['email'],
                    'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                    'banned' => 0,
                    'admin' => $admin
                );

                $aksi = $this->db->insert('users', $data);

                if ($aksi) {
                    return array('error' => false, 'message' => 'Data berhasil ditambahkan');
                } else {
                    return array('error' => true, 'message' => 'Data gagal ditambahkan');
                }
            }
        }
    }
    public function edit_user($post)
    {
        if (empty($post['nama']) || empty($post['email']) || empty($post['admin']) || empty($post['banned'])) {
            return array('error' => true, 'message' => 'Data tidak ada');
        } else {
            if ($post['admin'] == "tdk" or $post['banned'] == "tdk") {
                $admin = 0;
            } else {
                $admin = 1;
            }
            $cek = $this->db->get_where('users', ['id' => $post['id']])->row_array();
            if (empty($post['password'])) {
                $password = $cek['password'];
            } else {
                $password = $post['password'];
            }
            // cek user email
            $cek_email = $this->db->where('email', $post['email'])->where_not_in('id', $post['id'])->get('users')->num_rows();
            if ($cek_email > 0) {
                return array('error' => true, 'message' => 'Email sudah terdaftar');
            } else {
                $dupdate = array(
                    'nama' => $post['nama'],
                    'email' => $post['email'],
                    'password' => $password,
                    'banned' => $admin,
                    'admin' => $admin
                );
                $aksi = $this->db->where('id', $post['id'])->update('users', $dupdate);
                if ($aksi) {
                    return array('error' => false, 'message' => 'Data berhasil diedit');
                } else {
                    return array('error' => true, 'message' => 'Data gagal diedit');
                }
            }
        }
    }
    public function hapus_user($post)
    {
        if (empty($post['id'])) {
            return array('error' => true, 'message' => 'Data tidak ditemukan');
        } else {
            $aksi = $this->db->delete('users', ['id' => $post['id']]);
            if ($aksi) {
                return array('error' => false, 'message' => 'Data berhasil dihapus');
            } else {
                return array('error' => true, 'message' => 'Data gagal dihapus');
            }
        }
    }

    // ------------------------------------------------------------------------

}

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */