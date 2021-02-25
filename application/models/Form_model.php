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
    public function add_product($post)
    {
        if (empty($post['nama']) || empty($post['stock'])) {
            return array('error' => true, 'message' => 'Data tidak ada');
        } else {
            $di = array(
                'nama' => $post['nama'],
                'sisa_product' => $post['stock'],
                'is_active' => 1
            );
            $aksi = $this->db->insert('product', $di);
            if ($aksi) {
                return array('error' => false, 'message' => 'Data berhasil ditambahkan');
            } else {
                return array('error' => true, 'message' => 'Data gagal ditambahkan');
            }
        }
    }
    public function edit_product($post)
    {
        if (empty($post['nama']) || empty($post['stock'])) {
            return array('error' => true, 'message' => 'Data tidak ada');
        } else {
            $cek = $this->db->where('nama', $post['nama'])->where_not_in('id', $post['id'])->get('product');
            if ($cek->num_rows() > 0) {
                return array('error' => true, 'message' => 'Nama Product Sudah ada');
            } else {
                if ($post['aktif'] == "ya") {
                    $aktif = 1;
                } else {
                    $aktif = 0;
                }
                $dupdate = array(
                    'nama' => $post['nama'],
                    'sisa_product' => $post['stock'],
                    'is_active' => $aktif
                );
                $aksi = $this->db->where('id', $post['id'])->update('product', $dupdate);
                if ($aksi) {
                    return array('error' => false, 'message' => 'Data berhasil dirubah');
                } else {
                    return array('error' => true, 'message' => 'Data gagal dirubah');
                }
            }
        }
    }
    public function hapus_product($post)
    {
        if (empty($post['id'])) {
            return array('error' => true, 'message' => 'Data tidak ditemukan');
        } else {
            $aksi = $this->db->delete('product', ['id' => $post['id']]);
            if ($aksi) {
                return array('error' => false, 'message' => 'Data berhasil dihapus');
            } else {
                return array('error' => true, 'message' => 'Data gagal dihapus');
            }
        }
    }
    public function donew($post)
    {
        if (empty($post['prod_id']) || empty($post['qty'])) {
            return array('error' => true, 'message' => 'Data tidak sesuai, silahkan isi bidang yang dibutuhkan');
        } else {
            $cek_prod = $this->db->get_where('product', ['id' => $post['id']])->row_array();
            if ($post['qty'] > $cek_prod['sisa_product']) {
                return array('error' => true, 'message' => 'Transaksi Melebihi Stock');
            } else {
                $point = 5;
                $tot_point = $post['qty'] * $point;
                $cek = $this->db->get_where('poin', ['users_id' => $post['user_id']]);
                if ($cek->num_rows() == 0) {
                    $aksi = $this->db->insert('poin', ['users_id' => $post['user_id'], 'total' => $tot_point]);
                } else {
                    $d_poin = $cek->row_array();
                    $aksi = $this->db->where('users_id', $post['user_id'])->update('poin', ['total' => $d_poin['total'] + $tot_point]);
                }
                $aksi_prod = $this->db->where('id', $cek_prod['id'])->update('product', ['sisa_product' => $cek_prod['sisa_product'] - $post['qty']]);
                if ($aksi && $aksi_prod) {
                    return array('error' => false, 'message' => 'Transaksi Berhasil');
                } else {
                    return array('error' => true, 'message' => 'Transaksi Gagal');
                }
            }
        }
    }
    // ------------------------------------------------------------------------

}

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */