<?php

class UserTypeModel
{
    const SUPERADMIN = 'superadmin';
    const ADMIN = 'admin';
    const SELLER = 'seller';

    protected $userType;

    public function getUserType() {
        return $this->userType;
    }

    public function validateUserType($userType) {
        if (!in_array($userType, [self::SUPERADMIN, self::ADMIN, self::SELLER])) {
            return false;
        }
        return true;
    }

    public function getUserTypeModel() {
        return array(
            self::SUPERADMIN => 'SuperAdmin',
            self::ADMIN => 'Administrador',
        );
    }

}
