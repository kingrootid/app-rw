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
        if ($i == "0") {
          $label = "danger";
          $txt = "Tidak Aktif";
        } else if ($i == "1") {
          $label = "primary";
          $txt = "Aktif";
        }
        return "<center><span class=\"label label-$label\">$txt</span></center>";
      }),
      array('db' => 'admin', 'dt' => 4, 'formatter' => function ($i) {
        if ($i == "0") {
          $label = "danger";
          $txt = "Member";
        } else if ($i == "1") {
          $label = "primary";
          $txt = "Admin";
        }
        return "<center><span class=\"label label-$label\">$txt</span></center>";
      }),
      array('db' => 'id',  'dt' => 8, 'formatter' => function ($i) {
        return "
                <a href=\"javascript:;\" onclick=\"edit(" . $i . ")\" data-toogle=\"modal\" data-target=\"#modal-default\" class=\"label label-warning modal-show\"><i class=\"fa fa-edit\"></i></a>
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

  // ------------------------------------------------------------------------

}

/* End of file Data_model.php */
/* Location: ./application/models/Data_model.php */