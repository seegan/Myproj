<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



    function getSource($url)
    {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		$content = curl_exec($ch);
		curl_close($ch);

		if($content)
		{
			write_file($content,$File='content.txt');
			return true;
		}
		else
		{
			return false;
		}
	}


	function get_archive()
	{
		$source = read_file($File='content.txt');

		preg_match("/<div id='ArchiveList'>(.*)/", $source, $match);
		print_r($match); die();
	}


	function write_file($lines=array(),$File)
    {
        $textAr = explode("\n", $lines);
         
        $Handle = fopen($File, 'w');

        foreach($textAr as $line)
        {
            fwrite($Handle, $line); 
        }

    }

    function read_file($File)
    {
        $handle = fopen($File, 'r'); 
        $Data = fread($handle,41150000); 
        return $Data;
    }