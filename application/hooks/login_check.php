<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_check
{
    /**
    * @DESC Login_Check
    **/
    function checkPermission()
    {
        $CI =& get_instance();

        if (isset($CI->allow) && (is_array($CI->allow) === false OR in_array($CI->router->method, $CI->allow) === false)) {
            if (!$CI->session->userdata('is_login')) {
                alert_parent('로그인이 필요한 페이지입니다.', '/User/login');
            }
        }
    }
}
