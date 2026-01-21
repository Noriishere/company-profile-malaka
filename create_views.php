<?php

$basePath = __DIR__ . '/app/views';

if ($argc < 2) {
    echo "Usage:\n";
    echo "  php create_views.php namafile\n";
    echo "  php create_views.php folder.namafile\n";
    echo "  php create_views.php folder.subfolder.namafile\n";
    exit(1);
}

$input = $argv[1];

$parts = explode('.', $input);
$file  = array_pop($parts);

$dir = $basePath;
foreach ($parts as $part) {
    $dir .= '/' . $part;
}

if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

$viewFile = $dir . '/' . $file . '.php';

if (file_exists($viewFile)) {
    echo "EXISTS: {$viewFile}\n";
    exit(1);
}

$template = <<<PHP
<div>
</div>
PHP;

file_put_contents($viewFile, $template);

echo "CREATED: {$viewFile}\n";
