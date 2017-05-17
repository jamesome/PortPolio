<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{
	// override
	function __construct()
    {
		parent::__construct();
    }

	function test()
	{
		//$this->load->view('test');

		// $name = "PSY";
		//
		// echo '나의 이름은 $name 입니다.'."<br />";
		// echo "나의 이름은 $name 입니다."."<br />";
		// $a = 1;
		// $b = 2;
		// $c = 3;
		// $d = null;
		// echo ($name == "PSY" ? '1':'2')."<br />";
		// echo ($name == "PSY" ?? '1')."<br />";
		// echo ($d ?? $b ?? $c)."<br />"; //$d가 null이면 $b, $b가 null이면 $c
		// //echo $d ? $b:$c;
		//
		// $result = $c <=> $b;
		// if($result == -1) {
		// 	echo '-1';
		// } else if ($result == 0) {
		// 	echo '0';
		// } else {
		// 	echo '1';
		// }

		// define('THUMB_SIZE',
		//     array(
		//         "mini" => array(100, 75),
		//         "photo" => array(173, 129)
		//     )
		// );
		// echo "/static/data/thumb/".THUMB_SIZE['mini'][0];

		// $path = '/dir1/dir2/dir3/dir4/example.txt';
		// echo dirname($path, 1); // "/dir1/dir2"
		//echo $_SERVER['HTTP_X_FORWARDED_FOR'];
		//echo $_SERVER['REMOTE_ADDR'];
		//echo gethostbyname('www.pickdol.com');

		// $a = 'hello';
		// $$a = 'world';
		// echo "$a ${$a}";

		// global $root_path;
		// echo $root_path.'/static/data/user'.PHP_EOL;
		//phpinfo();
	}
}

// class foo {
// 	var $bar = 'I am bar.';
// 	var $arr = array('I am A.', 'I am B.', 'I am C.');
// 	var $r = 'I am r.';
//
// 	function abc()
// 	{
// 		echo 'abc';
// 	}
// }
// global $root_path;
// $foo = new foo();
// $bar = 'bar';
// $baz = array('foo', 'bar', 'baz', '1231');
//
// echo $foo->$bar."<br />";
// echo $foo->abc()."<br />";
// echo $foo->{$baz[1]}."<br />";
// echo $baz[1]."<br />";
// $arr = 'arr';
// echo $foo->{$arr[1]}."<br />";
// echo ($foo->$arr)[1]."<br />";



    class MyClass {

        const CONST_VALUE = 'A constant value';
		protected function myFunc()
		{
        	echo "MyClass::myFunc()\n";
    	}
    }

    $classname = 'MyClass';
    echo $classname::CONST_VALUE.'<br />'; // As of PHP 5.3.0
    echo MyClass::CONST_VALUE.'<br />';

	class OtherClass extends MyClass
	{
	    public static $my_static = 'static var';

	    public static function doubleColon() {
	        echo parent::CONST_VALUE.'<br />';
	        echo self::$my_static.'<br />';
	    }

		public function myFunc()
	    {
	        // But still call the parent function
	        parent::myFunc();
	        echo "OtherClass::myFunc()\n";
	    }
	}

	// $classname = 'OtherClass';
	// echo $classname::doubleColon(); // As of PHP 5.3.0
	//
	// OtherClass::doubleColon();

	$class = new OtherClass();
	$class->myFunc();
