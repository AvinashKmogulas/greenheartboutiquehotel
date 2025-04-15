<?php
    error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
	// Set timezone
  	date_default_timezone_set("UTC");
	
	$db_host = 'localhost';
	$db_name = 'greenhea_blog_db';
	$db_username = 'greenhea_bloguse';
	$db_password = '8j5hIAAI*e]E'; 
	
	$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
	
	
	// System ID
	$catStay = 1;
	$catDine = 2;
	$catWeddings = 3;
	$catEvents = 4;
	// Custom ID
	
	
	$bgColors = array("red", "yellow", "aqua", "blue", "light-blue", "green", "navy", "teal", "olive", "lime", "orange", "fuchsia", "purple", "maroon", "black");		
	
	function trimText($string, $limit, $break=" ", $pad="...") {
		// return with no change if string is shorter than $limit
		$string = preg_replace( "/\r|\n/", "", $string);
		if(strlen($string) <= $limit) return $string;
	  	$string = substr($string, 0, $limit);
	  	if(false !== ($breakpoint = strrpos($string, $break))) {
			$string = substr($string, 0, $breakpoint);
	  	}
	  	return $string . $pad;
	}
	
	function seoUrl($string) {
		//Lower case everything
		$string = strtolower($string);
		//Make alphanumeric (removes all other characters)
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean up multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
	}
	
	function seoUrlTwitter($string) {
		//Lower case everything
		$string = strtolower($string);
		//Make alphanumeric (removes all other characters)
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean up multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", " ", $string);
		return $string;
	}

	function highlightStr($haystack, $needle, $highlightColorValue)
    {
         // return $haystack if there is no highlight color or strings given, nothing to do.
        if (strlen($highlightColorValue) < 1 || strlen($haystack) < 1 || strlen($needle) < 1) {
            return $haystack;
        }
        preg_match_all("/$needle+/i", $haystack, $matches);
        if (is_array($matches[0]) && count($matches[0]) >= 1) {
            foreach ($matches[0] as $match) {
                $haystack = str_replace($match, '<strong style="color:'.$highlightColorValue.';">'.$match.'</strong>', $haystack);
            }
        }
        return $haystack;
    }
	
	
	// Function to get the client IP address
	function get_client_ip() {
		$ipaddress = '';
		if ($_SERVER['HTTP_CLIENT_IP'])
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if($_SERVER['HTTP_X_FORWARDED_FOR'])
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if($_SERVER['HTTP_X_FORWARDED'])
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if($_SERVER['HTTP_FORWARDED_FOR'])
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if($_SERVER['HTTP_FORWARDED'])
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if($_SERVER['REMOTE_ADDR'])
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}	
	
	$category_id='';
if(!empty($_GET['id'])){
	$getsearchTitle = str_replace("-"," ",strtolower($_GET['id']));
	$searchType=(!empty($_GET['tags'])) ? " AND FIND_IN_SET('$getsearchTitle',p.tags)" : '';
	$urlslug = strtolower($_GET['id']);
	$searchType22=(!empty($_GET['id'])) ? " AND p.urlslug='$urlslug'" : '';                    $searchType2=(!empty($_GET['id'])) ? " AND urlslug='$urlslug'" : '';
	$getResults = $mysqli->query("SELECT `id`,`title`,`description`,`tags`,`category_id`,`image`,`Status`,`post_date`,meta_title,meta_keywords,meta_description FROM `post` WHERE 1 AND `Status`='Active'$searchType2");
	$getRow = $getResults->fetch_array();
	$cat_id=$getRow[0]['category_id'];
	$category_id="AND id='$cat_id'";
}if(!empty($_GET['blog_url'])){
	$getsearchTitle = str_replace("-"," ",strtolower($_GET['blog_url']));
	$searchType=(!empty($_GET['tags'])) ? " AND FIND_IN_SET('$getsearchTitle',p.tags)" : '';
	$urlslug = strtolower($_GET['blog_url']);
	$searchType22=(!empty($_GET['blog_url'])) ? " AND p.urlslug='$urlslug'" : '';
	$searchType2=(!empty($_GET['blog_url'])) ? " AND urlslug='$urlslug'" : '';
	$getResults = $mysqli->query("SELECT `id`,`title`,`description`,`tags`,`category_id`,`image`,`Status`,`post_date`,meta_title,meta_keywords,meta_description FROM `post` WHERE 1 AND `Status`='Active'$searchType2");
	$getRow = $getResults->fetch_array();
	$cat_id=$getRow[0]['category_id']; 
	$category_id="AND id='$cat_id'";
}if(!empty($_GET['tags'])){
	$getsearchTitle = str_replace("-"," ",strtolower($_GET['tags']));
	$searchType=(!empty($_GET['tags'])) ? " AND FIND_IN_SET('$getsearchTitle',p.tags)" : '';
	$searchTypeCategory=(!empty($_GET['tags'])) ? " AND FIND_IN_SET('$getsearchTitle',tags)" : '';
	$getResults = $mysqli->query("SELECT `id`,`title`,`description`,`tags`,`category_id`,`image`,`Status`,`post_date`,meta_title,meta_keywords,meta_description FROM `post` WHERE 1 AND `Status`='Active'$searchTypeCategory");
	$getRow = $getResults->fetch_array();
	$cat_id=$getRow[0]['category_id'];
	$category_id="AND id='$cat_id'";
}if(!empty($_GET['cid'])){
	$getsearchTitle = str_replace("-"," ",strtolower($_GET['cid']));
	$searchCType=(!empty($_GET['cid'])) ? " AND title='$getsearchTitle'" : '';
	$getResults = $mysqli->query("SELECT `id`,meta_title,meta_keywords,meta_description FROM `category` WHERE 1 AND `Status`='Active'$searchCType");
	$getRow = $getResults->fetch_array();
	$cat_id=$getRow[0]['id'];
	$category_id="AND id='$cat_id'";
	$searchType=" AND p.category_id='$cat_id'";
}
$searchType=(!empty($searchType22)) ? $searchType22 : $searchType;
$results = $mysqli->query("SELECT p.id, p.title, p.description,p.video_show,p.urlslug, p.tags, p.category_id, c.title as category_name,p.image, p.Status, p.post_date FROM `post` as p,category as c WHERE 1 AND c.id=p.category_id AND p.Status='Active'$searchType ORDER BY p.id DESC");
	if(!empty($getRow)){
		$getRow=$getRow;
	}else{
		$getRow['meta_title']="greenheartboutiquehotel - Official Website Blog";
		$getRow['meta_description']="greenheartboutiquehotel - Official Website Blog";
	} 
?>
