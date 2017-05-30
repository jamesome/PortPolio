<?php
   // 압축해서 보내집니다.
   ob_start ("ob_gzhandler");

   // 헤더정보를 명시. 자바스크립트라고 알려줌.
   header ("content-type: text/javascript; charset: UTF-8");

   // 만료기간 명시.
   header ("cache-control: must-revalidate");
   $offset = 60 * 60;
   $expire = "expires: " . gmdate ("D, d M Y H:i:s", time() + $offset) . " GMT";
   header ($expire);
