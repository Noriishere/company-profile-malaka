<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';
date_default_timezone_set('Asia/Jakarta');
require_once dirname(__DIR__) . '/app/Config/config.php';

$app = new \Malaka\CompanyProfile\Core\App();