<?php

function get_post_revue(){

    global $db;

    $req = $db->query("
        SELECT  revue.id,
                revue.titre,
                revue.image,
                revue.date_publication,
                revue.contenue,
                revue.posted,
                admins.name
        FROM revue
        JOIN admins
        ON revue.writer = admins.email
        WHERE revue.id = '{$_GET['id']}'
    ");

    $result = $req->fetchObject();
    return $result;
}

function edit($title,$content,$posted,$id){

    global $db;

    $e = [
        'title'     => $title,
        'content'   => $content,
        'posted'    => $posted,
        'id'        => $id
    ];

    $sql = "UPDATE revue SET titre=:title, contenue=:content, date_publication=NOW(), posted=:posted WHERE id=:id";
    $req = $db->prepare($sql);
    $req->execute($e);

}