<?php

function get_revue(){
    global $db;

    $req = $db->query(" SELECT * FROM revue WHERE id='{$_GET['id']}' ");

    $result = $req->fetchObject();
    return $result;

}

function comment($name,$email,$comment){

    global $db;

    $c = array(
        'name'      => $name,
        'email'     => $email,
        'comment'   => $comment,
        'revue_id'   => $_GET["id"]

    );

    $sql = "INSERT INTO commentaire(name,email,comment,revue_id,date) VALUES(:name, :email, :comment, :revue_id, NOW())";
    $req = $db->prepare($sql);
    $req->execute($c);

}

function get_comments(){

    global $db;
    $req = $db->query("SELECT * FROM commentaire WHERE revue_id = '{$_GET['id']}' ORDER BY date DESC");
    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;


}