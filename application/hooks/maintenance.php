<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 정기점검시간설정
 *
 * 관리자 페이지에서 Redis에 변수를 넣고 그 변수로 판단.
 */
class Maintenance {

    public function check()
    {
        $CI =& get_instance();

        $redis_host = $CI->config->item('sess_save_path');

        preg_match('@^(?:tcp://)(?:www.)?([^:]+)@i', $redis_host, $matches);
        $redis = null;

        $redis = new Redis();
        $redis->connect($matches[1], '6379', 2);
        $get_str = $redis->get('Maintenance');

        $Maintenance = substr($get_str, 3, 2);
        $message = substr($get_str, 9, strlen($get_str));
        $client_ip = @$_SERVER['HTTP_X_FORWARDED_FOR'] ? @$_SERVER['HTTP_X_FORWARDED_FOR'] : @$_SERVER['REMOTE_ADDR'];
        $passed_ip = config_item('passed_ip');

        if($Maintenance == 'ON' && $CI->uri->segment(1) != 'Admin' && $CI->uri->segment(1) != 'ajax' && in_array($client_ip, $passed_ip) == false) {
            $_error =& load_class('Exceptions', 'core');
            echo $_error->show_error("", $message, 'error_maintenance', 200);
            exit;
        }
    }
}
