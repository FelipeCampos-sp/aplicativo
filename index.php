<?php
    if(empty($_SESSION)):
        session_start();
    endif;
require 'config.php';
$core = new Core();
$core->init();