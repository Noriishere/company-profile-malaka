<?php

namespace Malaka\CompanyProfile\Models;

use Malaka\CompanyProfile\Core\Database;

class MaintenanceModel extends Database
{
    private $tb = 'maintenance';

    public function getStatus()
    {
        $this->query("SELECT is_active, until FROM {$this->tb} ORDER BY id DESC LIMIT 1");
        return $this->single();
    }

    public function updateStatus($isActive, $until = null)
    {
        $this->query("
            INSERT INTO {$this->tb} (is_active, until) VALUES (:is_active, :until)
        ");

        $this->bindValue('is_active', (int)$isActive);
        $this->bindValue('until', $until);

        return $this->execute();
    }
}