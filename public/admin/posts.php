<?php

require_once __DIR__ . '/../bootstrap.php';

use Malaka\CompanyProfile\Controllers\Admin\Post;

$controller = new Post();
$controller->index();