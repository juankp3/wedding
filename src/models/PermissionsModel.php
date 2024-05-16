<?php

class PermissionsModel
{
    // protected $user;

    // public function __construct($user) {
    //     if (!in_array($userType, [self::SUPERADMIN, self::ADMIN, self::SELLER])) {
    //         throw new InvalidArgumentException("Tipo de usuario no válido");
    //     }

    //     $this->user = $user;
    // }


    public function getMenuDashboard($userType)
    {
        $permissions = array();
        switch ($userType) {
            case UserTypeModel::SUPERADMIN:
                $permissions['create'] = 1;
                $permissions['modify'] = 1;
                $permissions['delete'] = 1;
                $permissions['view'] = 1;
                break;

            case UserTypeModel::ADMIN:
                $permissions['create'] = 1;
                $permissions['modify'] = 1;
                $permissions['delete'] = 1;
                $permissions['view'] = 1;
                break;

            case UserTypeModel::SELLER:
                $permissions['create'] = 0;
                $permissions['modify'] = 0;
                $permissions['delete'] = 0;
                $permissions['view'] = 1;
                break;

            default:
                $permissions['create'] = 0;
                $permissions['modify'] = 0;
                $permissions['delete'] = 0;
                $permissions['view'] = 0;
                break;
        }

        return $permissions;
    }

    public function getMenuOrder($userType)
    {
        $permissions = array();
        switch ($userType) {
            case UserTypeModel::SUPERADMIN:
                $permissions['create'] = 1;
                $permissions['modify'] = 1;
                $permissions['delete'] = 1;
                $permissions['view'] = 1;
                break;

            case UserTypeModel::ADMIN:
                $permissions['create'] = 1;
                $permissions['modify'] = 1;
                $permissions['delete'] = 1;
                $permissions['view'] = 1;
                break;

            case UserTypeModel::SELLER:
                $permissions['create'] = 0;
                $permissions['modify'] = 0;
                $permissions['delete'] = 0;
                $permissions['view'] = 1;
                break;

            default:
                $permissions['create'] = 0;
                $permissions['modify'] = 0;
                $permissions['delete'] = 0;
                $permissions['view'] = 0;
                break;
        }

        return $permissions;
    }

    public function getMenuCatalog($userType)
    {
        $permissions = array();
        switch ($userType) {
            case UserTypeModel::SUPERADMIN:
                $permissions['create'] = 1;
                $permissions['modify'] = 1;
                $permissions['delete'] = 1;
                $permissions['view'] = 1;
                break;

            case UserTypeModel::ADMIN:
                $permissions['create'] = 1;
                $permissions['modify'] = 1;
                $permissions['delete'] = 1;
                $permissions['view'] = 1;
                break;

            case UserTypeModel::SELLER:
                $permissions['create'] = 0;
                $permissions['modify'] = 0;
                $permissions['delete'] = 0;
                $permissions['view'] = 1;
                break;

            default:
                $permissions['create'] = 0;
                $permissions['modify'] = 0;
                $permissions['delete'] = 0;
                $permissions['view'] = 0;
                break;
        }

        return $permissions;
    }

    public function getMenuCustomer($userType)
    {
        $permissions = array();
        switch ($userType) {
            case UserTypeModel::SUPERADMIN:
                $permissions['create'] = 1;
                $permissions['modify'] = 1;
                $permissions['delete'] = 1;
                $permissions['view'] = 1;
                break;

            case UserTypeModel::ADMIN:
                $permissions['create'] = 1;
                $permissions['modify'] = 1;
                $permissions['delete'] = 1;
                $permissions['view'] = 1;
                break;

            case UserTypeModel::SELLER:
                $permissions['create'] = 0;
                $permissions['modify'] = 0;
                $permissions['delete'] = 0;
                $permissions['view'] = 1;
                break;

            default:
                $permissions['create'] = 0;
                $permissions['modify'] = 0;
                $permissions['delete'] = 0;
                $permissions['view'] = 0;
                break;
        }

        return $permissions;
    }

    public function getMenuConfig($userType)
    {
        $permissions = array();
        switch ($userType) {
            case UserTypeModel::SUPERADMIN:
                $permissions['create'] = 1;
                $permissions['modify'] = 1;
                $permissions['delete'] = 1;
                $permissions['view'] = 1;
                break;

            case UserTypeModel::ADMIN:
                $permissions['create'] = 1;
                $permissions['modify'] = 1;
                $permissions['delete'] = 1;
                $permissions['view'] = 1;
                break;

            case UserTypeModel::SELLER:
                $permissions['create'] = 0;
                $permissions['modify'] = 0;
                $permissions['delete'] = 0;
                $permissions['view'] = 1;
                break;

            default:
                $permissions['create'] = 0;
                $permissions['modify'] = 0;
                $permissions['delete'] = 0;
                $permissions['view'] = 0;
                break;
        }

        return $permissions;
    }


    public function getPermissions($userType, $pageName)
    {
        $permissions = array();
        $permissions['dashboard']  =   $this->getMenuDashboard($userType);
        $permissions['ordres']     =   $this->getMenuOrder($userType);
        $permissions['catalog']    =   $this->getMenuCatalog($userType);
        $permissions['customer']   =   $this->getMenuCustomer($userType);
        $permissions['config']     =   $this->getMenuConfig($userType);


        echo "<pre>";
        var_dump($permissions);
        echo "</pre>";
        exit;

        // return $permissions[$pageName];

        // return $permissions;
    }

}
