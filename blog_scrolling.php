<?php

//Infinite scrolling for blog posts
function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

// Query DB for posts
    	if(!defined('DB_USER')){
		require "config.php";		
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
			die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
    }

    try {
            $query = "SELECT * FROM posts WHERE name LIKE :search";
            $q = $conn->prepare($query);
            $q->execute(array(':search' => $search));
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $data = $q->fetchAll();
        
        } catch (PDOException $e) {
            throw $e;
        }

    


if(!is_ajax_request()) {
    exit;
}
?>

<script>

    let container = document.querySelector('.blog-posts');
    let load_more = document.querySelector('#load-more');

    function showLoading() {
        var loader = document.querySelector('.loading')
        loader.style.display = 'block';
    }

    function hideLoading(){
        var loader = document.querySelector('.loading')
        loader.style.display = 'none';
    }

    function showLoadMore() {
        load_more.style.display = 'inline';
    }

    function hideLoadMore(){
        load_more.style.display = 'none';
    }

    function loadMore() {

        showLoading();
        hideLoadMore();

        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'blog.php?page=1', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function() {
            if(xhr.readyState == 4 && xhr.status == 200) {
                let result = xhr.responseText;

                hideLoading();
                showLoadMore();
            }
        };
        xhr.send();
    }

    load_more.addEventListener("click", loadMore);



loadMore();
</script>

