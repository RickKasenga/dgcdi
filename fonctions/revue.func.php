<?php

function get_revues(){

    global $db;

    $req = $db->query("SELECT * FROM revue where posted = 1 ORDER BY date_publication DESC");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;


}