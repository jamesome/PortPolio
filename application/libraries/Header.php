<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Header Class
 *
 * @explain    공통헤더
 */
Class Header {

    function __construtc()
    {
        $CI =& get_instance();

        $this->segment1 = $CI->uri->segment(1);
        $this->segment2 = $CI->uri->segment(2);
        $this->segment3 = $CI->uri->segment(3);
    }



}
