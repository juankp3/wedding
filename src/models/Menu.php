<?php

class Menu
{

    public function getMenuDashboard()
    {
		// echo "<pre>";
		// var_dump($_SESSION['loggedInUser']['type']);
		// echo "</pre>";exit;
        $dashboard = array(
            'dashboard' => array(
                'id' => 'dashboard',
                'name' => 'Default',
                'link' =>  BASE_URL . '/dashboard',
            ),
        );

        return array(
            'icon' => 'fa-star',
            'name' => 'Dashboard',
            'items' => $dashboard
        );
		exit;
    }

    public function getMenuOrder()
    {
        $orders = array(
            'order' => array(
                'id' => 'order',
                'name' => 'Pedido',
                'link' =>  BASE_URL . '/dashboard/order',
            ),
        );

        return array(
            'icon' => 'fa-shop',
            'name' => 'Pedidos',
            'items' => $orders
        );
    }

    public function getMenuCatalog()
    {
        $catalog = array(
            'category' => array(
                'id' => 'category',
                'name' => 'Categoria',
                'link' =>  BASE_URL . '/dashboard/category',
            ),
            'product' => array(
                'id' => 'product',
                'name' => 'Producto',
                'link' =>  BASE_URL . '/dashboard/product',
            ),
        );

        return array(
            'icon' => 'fa-tags',
            'name' => 'Catálogo',
            'items' => $catalog
        );
    }

    public function getMenuCustomer()
    {
        $customer = array(
            'customer' => array(
                'id' => 'customer',
                'name' => 'Cliente',
                'link' =>  BASE_URL . '/dashboard/customer',
            ),
        );

        return array(
            'icon' => 'fa-circle-user',
            'name' => 'Clientes',
            'items' => $customer
        );
    }

    public function getMenuGuest()
    {
        $guest = array(
            'guest' => array(
                'id' => 'guest',
                'name' => 'Invitados',
                'link' =>  BASE_URL . '/dashboard/guest',
            ),
			'table' => array(
                'id' => 'table',
                'name' => 'Mesas',
                'link' =>  BASE_URL . '/dashboard/table',
            ),
			'wishes' => array(
                'id' => 'wishes',
                'name' => 'Buenos deseos',
                'link' =>  BASE_URL . '/dashboard/wishes',
            ),
        );

        return array(
            'icon' => 'fa-circle-user',
            'name' => 'Invitados',
            'items' => $guest
        );
    }

    public function getMenuConfig()
    {
        $config = array(
			'user' => array(
                'id' => 'user',
                'name' => 'Usuario',
                'link' =>  BASE_URL . '/dashboard/user',
            ),
			'customer' => array(
                'id' => 'customer',
                'name' => 'Cliente',
                'link' =>  BASE_URL . '/dashboard/customer',
            ),
			'event' => array(
                'id' => 'event',
                'name' => 'Evento',
                'link' =>  BASE_URL . '/dashboard/event',
            ),

        );

        return array(
            'icon' => 'fa-gear',
            'name' => 'Configuraión',
            'items' => $config
        );

    }


    public function getMenu()
    {
        $menu = array();
        $menu['dashboard']  =   $this->getMenuDashboard();
        $menu['guest']   =   $this->getMenuGuest();
		if (UserTypeModel::SUPERADMIN == $_SESSION['loggedInUser']['type']){
			$menu['config']     =   $this->getMenuConfig();
		}

        return $menu;
    }

}
