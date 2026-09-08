<?php

namespace Malaka\CompanyProfile\Services;

use Malaka\CompanyProfile\Models\MaintenanceModel;

class MaintenanceService
{
    private MaintenanceModel $maintenance;

    public function __construct()
    {
        $this->maintenance = new MaintenanceModel();
    }

    public function getStatus(): array
{
    $status = $this->maintenance->getStatus();

    if (!$status) {
        return [
            'is_active' => 0,
            'until' => null
        ];
    }

    return $status;
}

    public function updateStatus(bool $isActive, ?string $until = null)
    {
        return $this->maintenance->updateStatus($isActive, $until);
    }
}