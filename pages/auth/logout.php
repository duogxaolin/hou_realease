<?php
require_once('../../config.php');
session_start();
session_destroy();
header("Location: ".$duogxaolin->home_url());