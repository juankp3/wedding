<?php
require_once dirname(__FILE__).'/../helper/Odoo.php';

class SupplierModel {

    public static $country = 'PE';

    public function __construct()
    {
        if (!empty($_SESSION['user']['country']))
            SupplierModel::$country = $_SESSION['user']['country'];
    }

    public function login($email, $passwd, $country)
    {
        Odoo::setConfiguration($country);
        $response = Odoo::execute(
            'ml.supplier',
            'search_read',
            array(
                array(
                    array('code', '=', $passwd),
                    array('email', '=', $email)
                )
            )
        );
        return $response;
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @param [type] $dateStart 01-01-2022
     * @param [type] $dateEnd   25-01-2022
     * @return void
     */
    public function getInvoices($id, $dateStart, $dateEnd)
    {
        Odoo::setConfiguration(SupplierModel::$country);
        $response = Odoo::execute(
            'ml.supplier.invoice',
            'search_read',
            array(
                array(
                    array('supplier_id', '=', $id),
                    array('date', '>=', date('Y-m-d', strtotime($dateStart))),
                    array('date', '<=', date('Y-m-d', strtotime($dateEnd)))
                )
            ),
            array(
                'order' => 'id desc',
            )
        );

        if ($response['hasError'])
            return array();

        return $response['data'];
    }

}