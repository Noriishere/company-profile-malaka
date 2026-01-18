<?php

namespace Malaka\CompanyProfile\Helpers;

trait ImageUploader
{
    protected function uploadImage(array $file, string $dir): string
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new \Exception('Upload file gagal');
        }

        if ($file['size'] > 2 * 1024 * 1024) {
            throw new \Exception('Ukuran gambar maksimal 2MB');
        }

        $allowedMime = ['image/jpeg', 'image/png', 'image/webp'];
        $mime = mime_content_type($file['tmp_name']);

        if (!in_array($mime, $allowedMime, true)) {
            throw new \Exception('Format gambar tidak didukung');
        }

        $ext = match ($mime) {
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/webp' => 'webp',
            default => throw new \Exception('Format tidak valid')
        };

        // pastikan folder ada
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $filename = 'post_' . uniqid('', true) . '.' . $ext;
        $destination = rtrim($dir, '/') . '/' . $filename;

        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            throw new \Exception('Gagal menyimpan gambar');
        }

        return $filename;
    }
}
