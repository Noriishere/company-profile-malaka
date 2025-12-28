<?php

namespace Malaka\CompanyProfile\Services;

use Malaka\CompanyProfile\Models\VisitedModel;

class VisitorServices
{
    private VisitedModel $visitorModel;

    public function __construct()
    {
        $this->visitorModel = new VisitedModel();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function handle(): int
    {
        if (!isset($_SESSION['visitor_token'])) {

            $token = $this->generateToken();

            $_SESSION['visitor_token'] = $token;

            $this->visitorModel->store([
                'visitor_token' => $token,
                'ip_address'    => $this->getIpAddress(),
                'user_agent'    => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
            ]);
        }

        return $this->visitorModel->visitors();
    }

    private function generateToken(): string
    {
        return bin2hex(random_bytes(16));
    }

    private function getIpAddress(): string
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        }

        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }
}
