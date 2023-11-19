<?php
session_start();

define('BASE_URL', 'http://localhost/do-an');

require_once 'auth.php';
require_once 'db/db_product.php';
require_once 'db/db_category.php';
require_once 'db/db_order.php';
require_once 'db/order_detail_db.php';
require_once 'functions.php';