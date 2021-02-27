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
        if (empty($post['nama'])) {
            return array('error' => true, 'message' => 'Data tidak ada');
        } else {
            $di = array(
                'nama' => $post['nama'],
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
        if (empty($post['nama'])) {
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
        if (empty($post['prod_id'])) {
            return array('error' => true, 'message' => 'Data tidak sesuai, silahkan isi bidang yang dibutuhkan');
        } else {
            $point = 5;
            $cek = $this->db->get_where('poin', ['users_id' => $post['user_id']]);
            if ($cek->num_rows() == 0) {
                $aksi = $this->db->insert('poin', ['users_id' => $post['user_id'], 'total' => $point]);
            } else {
                $d_poin = $cek->row_array();
                $aksi = $this->db->where('users_id', $post['user_id'])->update('poin', ['total' => $d_poin['total'] + $point]);
            }
            $di = array(
                'users_id' => $post['user_id'],
                'product_id' => $post['prod_id'],
                'date' => date('d-m-Y')
            );
            $aksi = $this->db->insert('transaction', $di);
            if ($aksi) {
                return array('error' => false, 'message' => 'Transaksi Berhasil');
            } else {
                return array('error' => true, 'message' => 'Transaksi Gagal');
            }
        }
    }
    public function add_rewards($post)
    {
        if (empty($post['nama']) || empty($post['file']) || empty($post['min'])) {
            return array('error' => true, 'message' => 'Data yang dibutuhkan tidak ada');
        } else {
            $config['upload_path']          = './upload/rewards/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite']            = true;
            $config['max_size']             = 1024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                return array('error' => true, 'message' => 'Gagal Upload Gambar');
            } else {
                $nama = $this->upload->data("file_name");
            }
            $di = array(
                'nama' => $post['nama'],
                'foto' => $nama,
                'min' => $post['min'],
                'is_active' => 1
            );
            $aksi = $this->db->insert('rewards', $di);
            if ($aksi) {
                return array('error' => false, 'message' => 'Data Rewards berhasil ditambahkan');
            } else {
                return array('error' => true, 'message' => 'Data Rewards gagal ditambahkan');
            }
        }
    }
    public function edit_rewards($post)
    {
        if (empty($post['nama']) || empty($post['min'])) {
            return array('error' => true, 'message' => 'Data yang dibutuhkan tidak ada');
        } else {
            $cek = $this->db->get_where('rewards', ['id' => $post['id']])->row_array();
            if (empty($post['file']['name'])) {
                $nama = $cek['foto'];
            } else {
                $config['upload_path']          = './upload/rewards/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['overwrite']            = true;
                $config['max_size']             = 1024; // 1MB
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file')) {
                    return array('error' => true, 'message' => 'Gagal Upload Gambar');
                } else {
                    $nama = $this->upload->data("file_name");
                }
            }
            $di = array(
                'nama' => $post['nama'],
                'foto' => $nama,
                'min' => $post['min'],
                'is_active' => 1
            );
            $aksi = $this->db->where('id', $cek['id'])->update('rewards', $di);
            if ($aksi) {
                return array('error' => false, 'message' => 'Data Rewards berhasil diedit');
            } else {
                return array('error' => true, 'message' => 'Data Rewards gagal diedit');
            }
        }
    }
    public function hapus_rewards($post)
    {
        if (empty($post['id'])) {
            return array('error' => true, 'message' => 'Data yang dibutuhkan tidak ada');
        } else {
            $cek = $this->db->get_where('rewards', ['id' => $post['id']])->row_array();
            unlink("./upload/rewards/" . $cek['foto'] . "");
            $aksi = $this->db->where('id', $cek['id'])->delete('rewards');
            if ($aksi) {
                return array('error' => false, 'message' => 'Data Rewards berhasil dihapus');
            } else {
                return array('error' => true, 'message' => 'Data Rewards gagal dihapus');
            }
        }
    }
    public function generate_keys($post)
    {
        if (empty($post['id'])) {
            return array('error' => true, 'message' => 'Terjadi kesalahan');
        } else {
            $cek = $this->db->get_where('keys', ['user_id' => $post['id']]);
            $key = implode('-', str_split(substr(strtolower(md5(microtime() . rand(1000, 9999))), 0, 30), 6));
            if ($cek->num_rows() == 0) {
                $di = array(
                    'user_id' => $post['id'],
                    'key' => $key,
                    'level' => 1,
                    'date_created' => date('d-m-Y H:i:s')
                );
                $aksi = $this->db->insert('keys', $di);
            } else {
                $di = array(
                    'key' => $key,
                    'level' => 1,
                    'date_created' => date('d-m-Y H:i:s')
                );
                $aksi = $this->db->where('user_id', $post['id'])->update('keys', $di);
            }
            if ($aksi) {
                return array('error' => false, 'message' => 'Berhasil generate Keys', 'key' => $key);
            } else {
                return array('error' => true, 'message' => 'Terjadi kesalahan saat generate key');
            }
        }
    }
    // ------------------------------------------------------------------------

}

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */