<?php

class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function _remap($method)
	{
		// $hedaerSelector['load_css'] = $this->header->load_Css();
		// $hedaerSelector['load_js'] = $this->header->load_Js();
    	// $hedaerSelector['load_head_tag'] = $this->header->load_HeadTag();
        // $hedaerSelector['load_header'] = $this->header->load_Header();

		if($this->input->is_ajax_request())
		{
			if( method_exists($this, $method) )
			{
				$this->{"{$method}"}();
			}
		}
		else
		{
	        //$this->load->view('common/header', $hedaerSelector);

			if( method_exists($this, $method) )
			{
				$this->{"{$method}"}();
			}
		}

	}

}
