<?php

namespace Malaka\CompanyProfile\Models;

use Malaka\CompanyProfile\Core\Database;

class VisitedModel extends Database
{
    public function isVisited($token)
    {
        $this->query("SELECT 1 FROM visitors WHERE visitor_token = ? LIMIT 1");
        $this->bindValue(1, $token);
        $this->execute();
        return $this->rowCount() > 0;
    }
    public function store($data)
    {
        $this->query("
        INSERT INTO visitors (visitor_token, ip_address, user_agent)
        VALUES (?, ?, ?)
    ");
        $this->bindValue(1, $data['visitor_token']);
        $this->bindValue(2, $data['ip_address']);
        $this->bindValue(3, $data['user_agent']);
        $this->execute();
    }
    public function visitors() {
        $this->query("SELECT COUNT(*) as total FROM visitors");
        return (int) $this->single()['total'];
    }
}
