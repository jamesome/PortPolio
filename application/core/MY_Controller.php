<?php

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        /**
         *  공통 변수
         */
        $this->segment1 = $this->uri->segment(1);
        $this->segment2 = $this->uri->segment(2);
        $this->segment3 = $this->uri->segment(3);

        // $this->session_idx = $this->session->userdata('idx');
        // $this->session_level = $this->session->userdata('level');
        // $this->session_point = $this->session->userdata('point');
    }

}
