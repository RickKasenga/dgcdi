<?php
require "../../fonctions/main.php";
$db->exec("DELETE FROM commentaire WHERE id = {$_POST['id']}");