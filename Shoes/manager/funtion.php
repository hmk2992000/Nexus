<?php
    function  getInput($string)
    {
        return isset($_GET[$string]) ? $_GET[$string] : '';
    }
	
	function  postInput($string)
    {
        return isset($_POST[$string]) ? $_POST[$string] : '';
    }

?>