<?php
require_once("config.php");
$list_cardauto = $duogxaolin->get_list(" SELECT * FROM `users` ORDER BY id DESC ");
excel($list_cardauto,$auth['username']);