<?php
use MONGODB\BSON\ObjectID;

function get_db() {
	$mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            "username" => "wai_web",
            "password" => "w@i_w3b",
        ]
    );
	$db = $mongo->wai;
	return $db;
}

function add_user($user) {
    $db = get_db();
    $db->users->insertOne($user);
}

function get_user(string $name){
    $db=get_db();
    $user = $db->users->findOne(["username"=> $name]);
    return $user;
}

function get_image($id) {
    $id = new ObjectID($id);
    $db = get_db();
    $image = $db->images->findOne(["_id" => $id]);
    return $image;
}

function save_image($image_data) {
    $db = get_db();
    $id = NULL;
    if ($return = $db->images->insertOne($image_data)) {
        return $return->getinsertedId();
    }
    else{
        return 0;
    }
}

function get_all_images() {
    $db = get_db();
    $images = $db->images->find();
    return $images;
}

function removeAll() {
	$db = get_db();
	$db->images->deleteMany([]);
	$db->users->deleteMany([]);
}