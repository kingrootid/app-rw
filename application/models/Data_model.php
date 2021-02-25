<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Data_model
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

class Data_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function userdata()
    {
        $table = 'users';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'id', 'dt' => 0),
            array('db' => 'nama', 'dt' => 1),
            array('db' => 'email', 'dt' => 2),
            array('db' => 'banned', 'dt' => 3, 'formatter' => function ($i) {
                if ($i == 0) {
                    $label = "info";
                    $txt = "Aktif";
                } else if ($i == 1) {
                    $label = "danger";
                    $txt = "Banned";
                }
                return "<center><span class=\"badge badge-$label\">$txt</span></center>";
            }),
            array('db' => 'admin', 'dt' => 4, 'formatter' => function ($i) {
                if ($i == 0) {
                    $label = "danger";
                    $txt = "Member";
                } else if ($i == 1) {
                    $label = "primary";
                    $txt = "Admin";
                }
                return "<center><span class=\"badge badge-$label\">$txt</span></center>";
            }),
            array('db' => 'id',  'dt' => 5, 'formatter' => function ($i) {
                return "
                <a href=\"javascript:;\" onclick=\"edit(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-warning modal-show\"><i class=\"fa fa-edit\"></i></a>
                <a href=\"javascript:;\" onclick=\"hapus(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-danger modal-show\"><i class=\"fa fa-trash\"></i></a>
                ";
            })
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname,
            'charset' => 'utf8'
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */
        $joinQuery = null;
        $extraWhere = '';
        $groupBy = '';
        $having = '';
        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
        );
    }
    public function duser($post)
    {
        if (empty($post['id'])) {
            return array('error' => true, 'message' => 'Data tidak ditemukan');
        } else {
            $query = $this->db->get_where('users', ['id' => $post['id']]);
            if ($query->num_rows() < 1) {
                return array('error' => true, 'message' => "Data tidak ditemukan");
            } else {
                return $query->row_array();
            }
        }
    }
    public function product()
    {
        $table = 'product';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'id', 'dt' => 0),
            array('db' => 'nama', 'dt' => 1),
            array('db' => 'is_active', 'dt' => 2, 'formatter' => function ($i) {
                if ($i == 0) {
                    $label = "danger";
                    $txt = "Tidak Aktif";
                } else if ($i == 1) {
                    $label = "primary";
                    $txt = "Aktif";
                }
                return "<center><span class=\"badge badge-$label\">$txt</span></center>";
            }),
            array('db' => 'sisa_product', 'dt' => 3),
            array('db' => 'id',  'dt' => 4, 'formatter' => function ($i) {
                return "
                <a href=\"javascript:;\" onclick=\"edit(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-warning modal-show\"><i class=\"fa fa-edit\"></i></a>
                <a href=\"javascript:;\" onclick=\"hapus(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"badge badge-danger modal-show\"><i class=\"fa fa-trash\"></i></a>
                ";
            })
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname,
            'charset' => 'utf8'
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * If you just want to use the basic configuration for DataTables with PHP
     * server-side, there is no need to edit below this line.
     */
        $joinQuery = null;
        $extraWhere = '';
        $groupBy = '';
        $having = '';
        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
        );
    }
    public function dproduct($post)
    {
        if (empty($post['id'])) {
            return array('error' => true, 'message' => 'Data tidak ditemukan');
        } else {
            $query = $this->db->get_where('product', ['id' => $post['id']]);
            if ($query->num_rows() < 1) {
                return array('error' => true, 'message' => "Data tidak ditemukan");
            } else {
                return $query->row_array();
            }
        }
    }
    // ------------------------------------------------------------------------

}

/* End of file Data_model.php */
/* Location: ./application/models/Data_model.php */