<?php
require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

require_once __DIR__ . '/../bootstrap.php';

use Malaka\CompanyProfile\Models\PostModel;

header('Content-Type: application/json');

$page = (int) ($_GET['page'] ?? 1);

$post = new PostModel();
echo json_encode($post->paginate($page, 6));