<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('main/main');
	}

    public function _remap($method)
	{
		if ($this->input->is_ajax_request()) {
			if (method_exists($this, $method)) {
				$this->{"{$method}"}();
			}
		} else {
			if (method_exists($this, $method)) {
				$this->{"{$method}"}();
			}
		}

	}
}
