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
    public function visitors()
    {
        $this->query("SELECT COUNT(*) as total FROM visitors");
        return (int) $this->single()['total'];
    }
    public function getAll($limit = 50)
    {
        $this->query("SELECT * FROM visitors ORDER BY id DESC LIMIT ?");
        $this->bindValue(1, (int)$limit);
        return $this->resultSet();
    }
    public function todayVisitors()
    {
        $this->query("
        SELECT COUNT(*) as total 
        FROM visitors 
        WHERE DATE(created_at) = CURDATE()
    ");
        return (int)$this->single()['total'];
    }

    public function last7Days()
    {
        $this->query("
        SELECT DATE(created_at) as date, COUNT(*) as total
        FROM visitors
        WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
        GROUP BY DATE(created_at)
        ORDER BY DATE(created_at)
    ");
        return $this->resultSet();
    }
    public function getVisitors($search = null, $startDate = null, $endDate = null, $sort = 'DESC', $limit = 10, $offset = 0)
    {
        $sort = strtoupper($sort) === 'ASC' ? 'ASC' : 'DESC';

        $sql = "SELECT * FROM visitors WHERE 1=1";
        $params = [];

        if ($search) {
            $sql .= " AND (ip_address LIKE ? OR user_agent LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }

        if ($startDate && $endDate) {
            $sql .= " AND created_at BETWEEN ? AND ?";
            $params[] = $startDate . " 00:00:00";
            $params[] = $endDate . " 23:59:59";
        }

        $sql .= " ORDER BY created_at $sort LIMIT ? OFFSET ?";
        $params[] = (int)$limit;
        $params[] = (int)$offset;

        $this->query($sql);

        $i = 1;
        foreach ($params as $param) {
            $this->bindValue($i++, $param);
        }

        return $this->resultSet();
    }

    public function countVisitors($search = null, $startDate = null, $endDate = null)
    {
        $sql = "SELECT COUNT(*) as total FROM visitors WHERE 1=1";
        $params = [];

        if ($search) {
            $sql .= " AND (ip_address LIKE ? OR user_agent LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }

        if ($startDate && $endDate) {
            $sql .= " AND created_at BETWEEN ? AND ?";
            $params[] = $startDate . " 00:00:00";
            $params[] = $endDate . " 23:59:59";
        }

        $this->query($sql);

        $i = 1;
        foreach ($params as $param) {
            $this->bindValue($i++, $param);
        }

        return (int)$this->single()['total'];
    }
}
