<?php

    //headers
    header('Access-Allow-Control-Origin: *');
    header('Content-Type: application/json');

    //initializing our api
    include_once('../core/initialize.php');

    //instantiate post
    $post = new Post($db);

    $result = $post->read();

    $num = $result->rowCount();

    if($num > 0){
        $post_arr = array();
        $post_arr['data'] = array();

         while($row = $result->fetch(PDO::FETCH_ASSO)){
             extract($row);
             $post_item = array(
                 'id' => $id,
                 'title' => $title,
                 'body' => html_entity_decode($body),
                 'author' => $author,
                 'category_id' => $category_id,
                 'category_name' => $category_name
             );
             array_push($post_arr['data'], $post_item);
         }
         //Convert to JSON and output
         echo json_encode($post_arr);

    } else{
        echo json_encode(array('message'=> 'No posts found.'));
    }
?>