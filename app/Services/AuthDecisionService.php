<?php

namespace App\Services;

use Exception;

class AuthDecisionService
{
    public function canAccessAdminPanel(?string $token): bool
    {
        try {
            return $this->verifyToken($token);
        } catch (Exception $e) {
    
            return false;
        }
    }

    private function verifyToken(?string $token): bool
    {
        if ($token !== 'valid-token') {
            throw new Exception('Invalid token');
        }

        return true;
    }
}