<?php

function post($title,$content,$lieu,$posted){
    global $db;

    $p = [
        'title'     =>  $title,
        'content'   =>  $content,
        'writer'    =>  $_SESSION['admin'],
        'lieu'      =>  $lieu,
        'posted'    =>  $posted

    ];

    $sql = "
      INSERT INTO revue(titre,contenue,writer,lieu,date_publication,posted)
      VALUES(:title,:content,:writer,:lieu,NOW(),:posted)
    ";

    $req = $db->prepare($sql);
    $req->execute($p);

}

function post_img($tmp_name, $extension){
    global $db;
    $id = $db->lastInsertId();
    $i = [
        'id'    =>  $id,
        'image' =>  $id.$extension      //$id = 25 , $extension = .jpg      $id.$extension = "25".".jpg" = 25.jpg
    ];

    $sql = "UPDATE revue SET image = :image WHERE id = :id";
    $req = $db->prepare($sql);
    $req->execute($i);
    move_uploaded_file($tmp_name,"../assets/img/".$id.$extension);
    header("Location:index.php?page=post_revue&id=".$id);
}