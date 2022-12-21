<?php

function inTable($table){
    global $db;
    $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();
}

function getColor($table,$colors){
    if(isset($colors[$table])){
        return $colors[$table];
    }else{
        return "orange";
    }
}

function get_comments(){
    global $db;

    $req = $db->query("
        SELECT  commentaire.id,
                commentaire.name,
                commentaire.email,
                commentaire.date,
                commentaire.revue_id,
                commentaire.comment,
                revue.titre
        FROM commentaire
        JOIN revue
        ON commentaire.revue_id = revue.id
        WHERE commentaire.seen = '0'
        ORDER BY commentaire.date ASC
    ");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}

function get_user(){
    global $db;

    $req = $db->query("
        SELECT * FROM admins WHERE email='{$_SESSION['admin']}';
    ");

    $result = $req->fetchObject();
    return $result;
}