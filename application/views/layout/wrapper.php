<?php
//proteksi halaman
$this->check_login->check();
//menggabungkan isi halaman
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');
