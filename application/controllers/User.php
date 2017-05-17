<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }

	public function index()
	{

	}

    public function login()
	{
		$this->load->view('user/login');
	}

	public function join()
	{
		$this->load->view('user/join');
	}

	public function find_id()
	{
		$this->load->view('user/find_id');
	}

	public function find_pw()
	{
		$this->load->view('user/find_pw');
	}
}
