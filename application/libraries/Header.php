<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Header Class
 *
 * @explain    공통헤더
 */
Class Header {

    function __construct()
    {
        $CI =& get_instance();

        $this->segment1 = $CI->uri->segment(1);
        $this->segment2 = $CI->uri->segment(2);
        $this->segment3 = $CI->uri->segment(3);
    }

    function load_Css()
    {
        return $this->loadCss();
    }

    function load_Js()
    {
        return $this->loadJs();
    }

    function load_HeadTag()
    {
        return $this->headTag();
    }

    function load_Header()
    {
        return $this->header();
    }


    protected function header()
    {
        $result = '';

        $result = $result.'<!doctype html>'."\n";
        $result = $result.'<html lang="en">'."\n";
        $result = $result.'    <head>'."\n";
        $result = $result.'        <meta charset="UTF-8">'."\n";
        $result = $result.'        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n";
        $result = $result.'        <title>PortPolio</title>'."\n";

        return $result;
    }

    protected function headTag()
    {
        $result = '';
        /**
         * TODO :: 아이콘 변경
         */
        $result = $result.'        <link href="/static/images/pickdol_64.ico" type="image/x-icon" rel="shortcut icon" />'."\n";
        $result = $result.'        <link href="/static/css/alertify.css" rel="stylesheet" />'."\n";

        if ($this->segment1 != 'Admin') {
            $result = $result.'        <link href="/static/css/layout.css" rel="stylesheet" />'."\n";
        }

        $result = $result.'        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>'."\n";
        $result = $result.'        <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>'."\n";
        $result = $result.'        <script src="//cdn.jsdelivr.net/alertifyjs/1.9.0/alertify.min.js"></script>'."\n";
        $result = $result.'        <script src="/static/js/common.js"></script>'."\n";

        return $result;
    }

    protected function loadCss()
    {
        $result = '';

        switch ($this->segment1) {

            case 'Main':
            case '':
                $result = '        <link href="/static/css/main.css" rel="stylesheet" />';
                break;

            case 'User':
                $result = '        <link href="/static/css/user.css" rel="stylesheet" />';
                break;

            case 'Board':
                $result = '        <link href="/static/css/board.css" rel="stylesheet" />';
                break;

            case 'Mypage':
                $result = '        <link href="/static/css/mypage.css?v=201705" rel="stylesheet" />';
                break;

            case 'Memo':
                $result = '        <link href="/static/css/memo.css" rel="stylesheet" />';
                break;

            case 'Admin':
                $result = '        <link href="/static/css/admin.css" rel="stylesheet" />';
                break;

            default:
                # code...
                break;
        }

        return $result;
    }

    protected function loadJs()
    {
        $result = '';

        switch ($this->segment1) {

            case 'Main':
            case '':
            case 'User':
                $result = '        <script src="/static/js/user.js"></script>'."\n";
                break;

            case 'Board':
                $result = '        <script src="/static/js/board.js"></script>'."\n";
                $result = $result.'        <script src="/static/js/board_draw.js"></script>'."\n";
                $result = $result.'        <script src="/static/js/paging.js"></script>'."\n";
                break;

            case 'Mypage':
                $result = '        <script src="/static/js/mypage.js?v=201705"></script>'."\n";
                $result = $result.'        <script src="/static/js/paging.js"></script>'."\n";
                break;

            case 'Memo':
                $result = '        <script src="/static/js/memo.js?v=201705"></script>'."\n";
                $result = $result.'        <script src="/static/js/paging.js"></script>'."\n";
                break;

            case 'Admin':
                switch ($this->segment3) {
                    case 'members_whole':
                    case 'members_block':
                    case 'members_withdrawal':
                    case 'members':
                    case 'members_createid':
                        $result = '        <script src="/static/js/admin_member.js"></script>';
                        $result = $result.'        <script src="/static/js/admin_member_draw.js"></script>'."\n";
                        break;

                    case 'point_list':
                    case 'point_pay':
                    case 'point_set':
                        $result = '        <script src="/static/js/admin_point.js"></script>'."\n";
                        break;

                    case 'class_view':
                    case 'class_point_list':
                    case 'class_point_pay':
                    case 'class_point_set':
                        $result = '        <script src="/static/js/admin_level.js"></script>'."\n";
                        break;

                    case 'bet_betting':
                    case 'bet_rank':
                        $result = '        <script src="/static/js/admin_bet.js"></script>'."\n";
                        break;

                    case 'message_list':
                    case 'message_confirm':
                    case 'message_write':
                        $result = '        <script src="/static/js/admin_memo.js"></script>'."\n";
                        break;

                    case 'ip_access':
                    case 'messagip_blocke_write':
                        $result = '        <script src="/static/js/admin_ip.js"></script>'."\n";
                        break;

                    case 'best':
                    case 'free':
                    case 'tip':
                    case 'humor':
                    case 'photo':
                    case 'sports':
                    case 'entry':
                    case 'reply':
                    case 'accuse':
                    case 'notice':
                    case 'qna':
                    case 'boardView':
                        $result = '        <script src="/static/js/admin_board.js?v='.time().'"></script>'."\n";
                        $result = $result.'        <script src="/static/js/admin_board_draw.js"></script>'."\n";
                        break;

                    case 'site_popup':
                        $result = '        <script src="/static/js/popup.js"></script>'."\n";
                        break;

                    case 'site_imagebanner':
                        $result = '        <script src="/static/js/banner.js"></script>'."\n";
                        break;

                    case 'stats':
                        $result = '        <script src="/static/js/admin_stat.js"></script>'."\n";
                        break;
                }

                $result = $result.'        <script src="/static/js/paging.js"></script>'."\n";
                $result = $result.'        <script src="/static/js/admin.js"></script>'."\n";

                break;

            default:
                # code...
                break;
        }

        if ($this->segment1 != 'Admin') {
            $result = $result.'        <script src="/static/js/jquery.bxslider.min.js"></script>'."\n";
            $result = $result.'        <script src="/static/js/publish.js"></script>'."\n";
            $result = $result.'        <script src="/static/js/popup.js"></script>'."\n";
            $result = $result.'        <script src="/static/js/banner.js"></script>'."\n";
        }

        return $result;
    }



}
