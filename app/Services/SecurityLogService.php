<?php

namespace Malaka\CompanyProfile\Services;

use Malaka\CompanyProfile\Core\Database;

class SecurityLogService
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function log($username, $action, $status)
    {
        $this->db->query("
            INSERT INTO security_logs 
            (username, ip_address, user_agent, action, status) 
            VALUES (:username, :ip, :agent, :action, :status)
        ");

        $this->db->bindValue(':username', $username);
        $this->db->bindValue(':ip', $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN');
        $this->db->bindValue(':agent', $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN');
        $this->db->bindValue(':action', $action);
        $this->db->bindValue(':status', $status);

        $this->db->execute();
    }
}