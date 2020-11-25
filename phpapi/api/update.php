<?php

    //headers
    header('Access-Allow-Control-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Mehtods, Authorization,X-Requested-With');

    //initializing our api
    include_once('../core/initialize.php');

    //instantiate post
    $post = new Post($db); 

    //get raw data from the user
    $data = json_decode(file_get_contents("php://input"));

    $post->id = $data->id;
    $post->title = $data->title;
    $post->body = $data->body;
    $post->author = $data->author;
    $post->category_id = $data->category_id;

    //create post
    if($post->update()){
        echo json_encode(
            array('message' => 'Post updated.')
        );

    } 
    else{
        echo json_encode(
            array('message' => 'Post not updated')
        );
    }
    
?>