(function (context) {

    if (context.common) {
        return;
    }

    context.common = {
        /**
         * 시작 페이지 ie 11 이전 버전만.
         */
        setStartPage: function () {

            if (document.all) {
                document.body.style.behavior = 'url(#default#homepage)';
                document.body.setHomePage(g_url);
            }
            else if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox 즐겨찾기
                window.sidebar.addPanel(document.title, g_url, "");
            }
            else if (window.external && ('AddFavorite' in window.external)) {
                window.external.AddFavorite(g_url, document.title);
            }
            else if (window.opera && window.print) {
                // Opera
                var elem = document.createElement('a');
                elem.setAttribute('href', url);
                elem.setAttribute('title', document.title);
                elem.setAttribute('rel', 'sidebar');
                elem.click();
            }
            else {
                alert("지원되지 않는 웹 브라우저 입니다.\n\n[Ctrl+D] 키를 누르시면 즐겨찾기에 추가하실 수 있습니다.");
                return true;
            }
        },
        /**
         * 즐겨찾기 추가 스크립트
         */
        addFavorites: function () {

            var url = location.href;

            if (window.external && ('AddFavorite' in window.external)) { // ie
                window.external.AddFavorite(g_url, document.title);
            }
            else if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox 즐겨찾기
                window.sidebar.addPanel(document.title, url, "");
            }
            else if (window.opera && window.print) {
                // Opera
                var elem = document.createElement('a');
                elem.setAttribute('href', url);
                elem.setAttribute('title', document.title);
                elem.setAttribute('rel', 'sidebar');
                elem.click();
            }
            else {
                alert("지원되지 않는 웹 브라우저 입니다.\n\n[Ctrl+D] 키를 누르시면 즐겨찾기에 추가하실 수 있습니다.");
                return true;
            }
        },
        /**
         * 쿠키 저장
         */
        set_Cookie: function(cookiename, cookievalue, expireday) {

            var d = new Date();
            d.setTime(d.getTime() + (expireday * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cookiename + "=" + escape(cookievalue) + ";" + expires + ';path=/;';
        },
        /**
         * 쿠키 가져오기
         */
        get_Cookie: function(cookiename) {

            var name = cookiename + '=';
            var cdata = document.cookie.split(';');
            var value = '';
            for (var i = 0; i < cdata.length; i++) {
                var c = cdata[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    value = c.substring(name.length, c.length);
                }
            }

            return unescape(value);
        },
        /**
         * 쿠키 삭제
         */
        del_Cookie: function(cookiename) {

            try {
                set_Cookie(cookiename, "", -1);
            }
            catch (ex) {
                console.log('del_cookie err:', ex.number, ex.name, ex.message)
            }
        },
        /**
         * ie 버전
         */
        get_IE_ver: function() {
            var version = -1; // Return value assumes failure.
            var agents = navigator.userAgent;
            var words = false;

            if (navigator.appName == 'Microsoft Internet Explorer') {
                words = 'MSIE ';
            }
            else {
                if (agents.search("Trident/") > -1) {
                    words = 'rv:';
                }
                else if (agents.search("Edge/") > -1) { // IE 12 ~
                    words = 'Edge/';
                }
            }

            if (words) {
                var re = new RegExp(words + "([0-9]{1,}[\.0-9]{0,})");
                if (re.exec(agents) != null) {
                    version = parseFloat(RegExp.$1);
                }
            }

            return version;
        },
        /**
         * Window popup
         */
        window_popup: function (url, pname, wid, hig, tp, lt, is_resize) {

            if (url == null || url == undefined) { return false; }
            if (wid == null || wid == undefined) { return false; }
            if (hig == null || hig == undefined) { return false; }

            var resize = is_resize ? 'yes' : 'no';
            var wpop = window.open(url, (pname || 'w_popup'), " width=" + wid + ", height=" + hig + ", top=" + (tp || '100') + ", left=" + (lt || '100') + ", resizable=" + resize + ", toolbar=no, menubar=no, scrollbars=yes, location=yes, status=no");

            wpop.focus();
        },
        /**
         * Class="on" 으로 현재 페이지 표시 기능.
         */
        setNavigation: function () {

            var path = window.location.pathname;
            path = path.replace(/\/$/, "");
            path = decodeURIComponent(path);

            $("#subnavi a").each(function () {

                var href = $(this).attr('href');
                if (href.indexOf(path) > -1) {
                    $(this).addClass('on');
                }
            });
        },
        /**
         * TODO :: 레벨이미지
         */
        get_user_level_icon: function (ulevel) {

            var src = "/static/image/level.png";

            if (ulevel > 0 && ulevel < 21) {
                src = "/static/image/level" + ulevel + ".png";
            }
            else if (ulevel >= 90) {
                src = "/static/images/level91.png";
            }

            return src;
        },
        /**
         * 체크박스 선택 및 전체선택
         */
        check_All: function (t) {

            $('input[type="checkbox"]').each(function () {
                if ($(this).hasClass("chkb") || $(this).hasClass("chkbAll")) {
                    $(this).prop("checked", t.checked);
                }
            });
        },
        /**
         * 비밀번호 형식 확인
         */
        password_check: function () {

            var join_pw = $(".join_pw").val().trim();

            var chk_num = join_pw.search(/[0-9]/g);
            var chk_eng = join_pw.search(/[a-z]/ig);

            if (!/^[a-zA-Z0-9\~\∙\!\@\#\$\%\^\&\*\(\)\_\-\+\=\{\}\[\]\|\\\;\:‘\“\<\>\,\.\?\/]{6,10}$/.test(join_pw)) {
                //"비밀번호는 6~10자리를 사용해야 합니다."

                return false;
            }
            else if (chk_num < 0 || chk_eng < 0) {
                //"비밀번호는 숫자와 영문자를 혼용하여야 합니다."

                return false;
            }
            else if (/(\w)\1\1\1/.test(join_pw)) {
                //"비밀번호에 같은 문자를 4번 이상 사용하실 수 없습니다."

                return false;
            }
        },
        /**
         * memid check
         */
        get_join_id_check: function () {

            var join_id = $('.join_id').val().trim();

            if (/[^0-9a-zA-Z]/.test(join_id)) {
                //"특수문자는 넣을 수 없습니다."

                return false;
            }
            else if (join_id.bytes() > 10 || join_id.bytes() < 4) {
                //"숫자/영문조합 4~10자리까지 가능합니다."

                return false;
            }


            return true;
        },
        /**
         * nickname check
         */
        get_join_nick_check: function() {

            var strNick = $('.join_nick').val().trim();

            if (/[\~\∙\!\@\#\$\%\^\&\*\(\)\_\-\+\=\{\}\[\]\|\\\;\:‘\“\<\>\,\.\?\/ ]/.test(strNick)) {
                //"특수문자는 넣을 수 없습니다."
                return false;
            }
            else if (/[^0-9a-zA-Zㄱ-ㆎ가-힣]/.test(strNick)) {
                //"특수문자는 넣을 수 없습니다."
                return false;
            }
            else if (strNick.bytes() > 16 || strNick.bytes() < 4) {
                //"한글 2~8자리, 숫자/영문조합 4~16자리까지 가능합니다."

                return false;
            }

            return true;
        },
        /**
         * 숫자 콤마 찍기(PHP - Number_Format);
         */
        number_Format: function(str) {

            if (!str) str = "0";
            else str = str + "";

            if (/[^0-9,]/.test(str)) return str;

            str = str.replace(/,/g, "");

            for (var i = 0; i < parseInt(str.length / 3, 10); i++) {
                str = str.replace(/([0-9])([0-9]{3})(,|$)/, "$1,$2$3");
            }
            return str;
        },
        /**
         * TODO :: 게시판 헤더
         */
        board_head: function() {

            var path = type;

            $("#subnavi a").each(function() {

                var href = $(this).attr('href');
                var href_slice = href.slice(13, 26);

                if (href_slice.indexOf(path) > -1) {
                    $(this).addClass('on');
                }
            });
        }

    };
})(window);


// bytes()함수 구현
String.prototype.bytes = function () {
    if (this == null || this == undefined) return false;

    var str = this;
    var len = 0;
    for (var i = 0; i < str.length; i++) {
        var _ch = str[i].charCodeAt();
        len += (_ch >= 0x0080 && _ch <= 0xFFFF) ? 2 : 1;
    }

    return len;
};

// three bytes()함수 구현
String.prototype.tbytes = function () {
    if (this == null || this == undefined) return false;

    var str = this;
    var len = 0;
    for (var i = 0; i < str.length; i++) {
        var _ch = str[i].charCodeAt();
        len += (_ch >= 0x0080 && _ch <= 0xFFFF) ? 3 : 1;
    }

    return len;
};

// Trim()함수 구현
String.prototype.trim = function () {
    return this.replace(/(^\s*)|(\s*$)/gi, "");
};

//문자열 자르기 한글 2바이트 게산.
String.prototype.cut = function (len, tail) {
    var str = this.toString();
    var strlen = 0;
    for (var i = 0; i < str.length; i++) {
        var _ch = str[i].charCodeAt();
        strlen += (_ch >= 0x0080 && _ch <= 0xFFFF) ? 2 : 1;
        if (strlen > len) return str.substring(0, i).concat(tail);
    }

    return str;
};

// ie8 indexOf
if (!Array.indexOf) {
    Array.prototype.indexOf = function (obj, start) {
        var k = -1;
        var this_len = this.length;
        for (var i = (start || 0); i < this_len; i++) {
            if (this[i] == obj) {
                k = i;
                break;
            }
        }
        return k;
    };
};
