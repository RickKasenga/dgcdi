<?php

function get_revue(){

    global $db;

    $req = $db->query("SELECT * FROM revue ORDER BY date_publication DESC");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;


}