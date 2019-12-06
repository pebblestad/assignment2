<?php
	if(isset($_POST["random"]))
	{
	    randomComic();
	};

    function randomComic(){
	$rng = rand(1,1500);
	$link = "https://xkcd.com/" . $rng . "/info.0.json";
	getComic($link);
    }

	/* This Function is used to get the comic */
	function getComic($link){
	    $handle = curl_init();
	    curl_setopt($handle, CURLOPT_URL, $link);
	    curl_setopt_array($handle,
	    array(
	    CURLOPT_URL => $link,
	    CURLOPT_RETURNTRANSFER => true
	    )
	    );
	    $output = curl_exec($handle);
	    $response = json_decode($output, true);
	    curl_close($handle);
	    echo '<h3> ' . $response['title'] . '</h3><br>';
	    echo '<h3> ' . $response['year'] . '</h3><br>';
	    echo '<img src="' . $response['img'] . '" alt= "The picture...">';
	}

	function homeComic(){
	    $link = "https://xkcd.com/info.0.json";
	    getComic($link);
	}

	
	/* Displays the site name */
	function site_name()
	{
	    echo config('name');
	}
	/* Displays the site url provided in config */
	function site_url()
	{
	    echo config('site_url');
	}
	/* Displays site version */
	function site_version()
	{
	    echo config('version');
	}
	/* Website navigation */
	function nav_menu()
	{
	    $nav_menu = '';
	    $nav_items = config('nav_menu');
	    foreach ($nav_items as $uri => $name) {
	        $class = str_replace('page=', '', $_SERVER['QUERY_STRING']) == $uri ? 'active' : '';
	        $url = config('site_url') . '/' . (config('pretty_uri') || $uri == '' ? '' : '?page=') . $uri;
	        $nav_menu .= '<li class="nav-item ' . $class .'"> <a href="' . $url . '" title="' . $name . '" class="nav-link ' . '">' . $name . '</a>' . '</li>';
	    }
	    echo trim($nav_menu);
	}
	/**
	 * Displays page title. It takes the data from
	 * the URL, replaces the hyphens with spaces, and
	 * it capitalizes the words.
	 */
	function page_title()
	{
	    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'Home';
	    echo ucwords(str_replace('-', ' ', $page));
	}
	/**
	 * Displays page content. It takes the data from
	 * the static pages inside the pages/ directory.
	 * When not found, display the 404 error page.
	 */
	function page_content()
	{
	    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
	    $path = getcwd() . '/' . config('content_path') . '/' . $page . '.php';
	    if (! file_exists($path)) {
	        $path = getcwd() . '/' . config('content_path') . '/404.php';
	    }
	    // echo file_get_contents($path);
	    require config('content_path') . '/' . $page . '.php';
	}

	/*  Starts everything and displays the template */
	function init()
	{
	    require config('template_path') . '/template.php';
	}
