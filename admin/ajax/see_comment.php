<?php

require "../../fonctions/main.php";

$db->exec("UPDATE commentaire SET seen='1' WHERE id='{$_POST['id']}'");