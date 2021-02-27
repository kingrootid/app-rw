<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/chriskacerguis/codeigniter-restserver/src/RestController.php';
require FCPATH . 'vendor/chriskacerguis/codeigniter-restserver/src/Format.php';

class Api extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Data_model', 'dmod');
    }

    public function poin_get()
    {
        $key = $this->input->get_request_header("X-API-KEY");
        $cek_poin = $this->dmod->cek_poin($key);
        $rewards = $this->dmod->cek_rewards();
        $this->response([
            'status' => true,
            'message' => 'User found',
            'remains_poin' => $cek_poin['total'],
            'rewards' => $rewards
        ], 200);
    }
}
