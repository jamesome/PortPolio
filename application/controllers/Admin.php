<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        redirect('/Admin/view/admin_main');
	}

    function view()
    {
        $board_name = $this->uri->segment(3);

        $this->load->view('/admin/'.$board_name);
    }





}
