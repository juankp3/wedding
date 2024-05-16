<?php
require_once dirname(__FILE__) . '/../../models/PaymentModel.php';

class PaymentApiController
{

    public function getPayments()
    {
        $paymentModel = new PaymentModel();
        $payments = $paymentModel->getPayment();
        Flight::json($payments);
    }

    public function getPaymentsByStore($id)
    {
        $paymentModel = new PaymentModel();
        $payments = $paymentModel->getPayment();
        Flight::json($payments);
    }

}


