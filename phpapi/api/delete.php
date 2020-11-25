<?php

    //headers
    header('Access-Allow-Control-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Mehtods, Authorization,X-Requested-With');

    //initializing our api
    include_once('../core/initialize.php');

    //instantiate post
    $post = new Post($db); 

    //get raw data from the user
    $data = json_decode(file_get_contents("php://input"));

    $post->id = $data->id;
    

    //create post
    if($post->delete()){
        echo json_encode(
            array('message' => 'Post delete.')
        );

    } 
    else{
        echo json_encode(
            array('message' => 'Post not delete')
        );
    }
    
?>