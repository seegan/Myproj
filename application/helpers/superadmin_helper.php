<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	function url_to_domain($url)
	{
	    $host = @parse_url($url, PHP_URL_HOST);
	 
	    // If the URL can't be parsed, use the original URL
	    // Change to "return false" if you don't want that
	    if (!$host)
	        $host = $url;
	 
	    // The "www." prefix isn't really needed if you're just using
	    // this to display the domain to the user
	    if (substr($host, 0, 4) == "www.")
	        $host = substr($host, 4);
	 
	    // You might also want to limit the length if screen space is limited
	    if (strlen($host) > 50)
	        $host = substr($host, 0, 47) . '...';
	    return $host;
	}

    function store_site_url($url)
    {
    	$CI =& get_instance();
    	$domain = url_to_domain($url);
	    $domain_exist = $CI->common_model->selectData($table="copy_sites",$selectData=array('id'),$condition=array('url'=>$domain));
	    if($domain_exist==false)
	    {
	    	$domain_id = $CI->common_model->insertData($table="copy_sites",$data=array('url'=>$domain,'can_crawl'=>1,'is_active'=>0));
	    }
	    else{
	    	$result = $domain_exist->result();
	    	$domain_id = $result[0]->id;
	    }

	    return $domain_id;
    }


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


	function get_archive($source='',$site_id='')
	{
		$file = read_file($File='content.txt');

		if($source=='full')
		{
			preg_match("/<div id='ArchiveList'>(.*)/", $file, $match);
			if($match[0])
			{
				$months = get_archive_month_urls($match[0]);
				return $months;
			}
			else
			{
				die('Can\'t find Archive..');
			}
		}


		if($source=='month')
		{
			preg_match("/<ul class='posts'>(.*)<\/a><\/li><\/ul><\/li><\/ul><ul class='hierarchy'><li class='archivedate collapsed'>/", $file, $match);
			if(!isset($match[0]))
			{
				preg_match("/<ul class='posts'>(.*)<\/li><\/ul><\/li><\/ul><\/li><\/ul><ul class='hierarchy'><li class='archivedate collapsed'>/", $file, $match);
				
			}
			if(!isset($match[0]))
			{
				preg_match("/<ul class='posts'>(.*)<\/li><\/ul><\/li><\/ul><\/div><\/div><div class=\'clear\'><\/div>/", $file, $match);
				
			}

			if($match[0])
			{
				preg_match_all("|<a href=\'(.*).html'>|U", $match[0], $links);
				
				if($links[1])
				{
					foreach ($links[1] as $value) {
						$url = $value.'.html';
						store_story_site_url($url,$site_id);
					}
				}

			}
			else
			{
				die('Can\'t find Archive..');
			}
		}

	}


	function store_story_site_url($url,$site_id)
	{
    	$CI =& get_instance();

	    $domain_exist = $CI->common_model->selectData($table="copy_sites_story_url",$selectData=array('id'),$condition=array('url'=>$url));
	    if($domain_exist==false)
	    {
	    	$data['url_id'] = $CI->common_model->insertData($table="copy_sites_story_url",$data=array('url'=>$url,'site_id'=>$site_id,'can_crawl'=>1,'is_active'=>0,'crawl_error'=>0));
	    	$data['status'] = 'New';
	    }
	    else{
	    	$result = $domain_exist->result();
	    	$data['url_id'] = $result[0]->id;
	    	$data['status'] = 'Exist';
	    }

	    return $data;
	}

	//////////


	function get_archive_month_urls($source)
	{
		preg_match_all("|<a class=\'post-count-link\' href=\'(.*)\'>(.*)<\/a>|U", $source, $match);

		$pt = '/html$/';
		foreach ($match[1] as $key => $img){
		    $res = preg_match($pt, $img);
		    if(!$res){
		      unset($match[1][$key]);
		    }
		}
		return $match[1];

	}


	function get_story_urls($month_url)
	{
		getSource($month_url);
	}

	//////////


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


    function get_story_content($file='')
    {
    	if($file=='')
    	{
    		$file = read_file($File='content.txt');
    	}
    	
		$dom = new DOMDocument();
		libxml_use_internal_errors(true);
		$dom->loadHTML($file);

		$xpath = new DOMXPath($dom);

		$div = $xpath->query('//div[@class="post-body entry-content"]');
		$data['is_story'] = $div->length;

		$div = $div->item(0);


		$data['story'] = $dom->saveXML($div);
		
		return $data;
		
    }

    function get_title_content($file='')
    {
    	if($file=='')
    	{
    		$file = read_file($File='content.txt');
    	}
		$dom = new DOMDocument();
		libxml_use_internal_errors(true);
		$dom->loadHTML($file);

		$xpath = new DOMXPath($dom);

		$div = $xpath->query('//h3[@class="post-title entry-title"]');
		$data['is_title'] = $div->length;

		$div = $div->item(0);

		$str = $dom->saveXML($div);

		
		$data['title'] = strip_tags($str);

		return $data;

    }

    function story_from_blog_to_db($data, $copy_id, $site_id)
    {
    	$CI =& get_instance();

    	if($data['story']['is_story']==1)
    	{
    		if($data['title']['is_title']!=1)
    		{
    			$title = 'No Title';
    		}
    		else
    		{
    			$title = $data['title']['title'];
    		}
    		$insData=array('title'=>$title,'story'=>$data['story']['story'],'title_slug'=>'0','author'=>0,'is_active'=>1);

	    	$story_id = $CI->common_model->insertDataAll($table="ring_stories",$insData);

	    	
	    	var_dump($story_id); die();
	    
    	}
    	else
    	{

    	}
    }