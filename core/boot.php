<?php
session_start();

define('BASE_URL', 'http://localhost/do-an/shopv1/');

require_once 'auth.php';
require_once 'db/db_product.php';
require_once 'db/db_category.php';
require_once 'db/db_order.php';
require_once 'db/db_order_detail.php';
require_once 'functions.php';