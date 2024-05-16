<?php
require_once dirname(__FILE__) . '/../../models/ProductModel.php';

class ProductApiController
{

    public static function getProducts()
    {
        $request = Flight::request();
        $offset = $request->query['offset'] ?? 0;
        $limit = $request->query['limit'] ?? 10 ;

        $currentUrl = 'http://localhost:4000/api/v1/products';
        $productModel = new ProductModel();
        $totalProducts = $productModel->getProducts();

        $nextPageOffset = $offset + $limit;
        $previousPageOffset = max(0, $offset - $limit);
        $hasNextPage = $nextPageOffset < count($totalProducts);

        $products['success'] = true;
        $products['data'] = $productModel->getProducts($offset, $limit);
        $products['pagination'] = array(
            'count' => count($totalProducts),
            'next' => $hasNextPage ? $currentUrl . "?offset=$nextPageOffset&limit=$limit" : null,
            'previous' =>  $offset > 0 ? $currentUrl . "?offset=$previousPageOffset&limit=$limit" : null,
        );

        // {
        //     "success": false,
        //     "error": {
        //         "code": 500,
        //         "message": "Error interno del servidor",
        //         "details": "Ocurrió un error al consultar la base de datos de productos."
        //     }
        // }

        Flight::json($products);
    }


    public static function createProduct()
    {
        $productModel = new ProductModel();
        $name = Flight::request()->data->name;
        $barcode = Flight::request()->data->barcode;

        if (empty($name)){
            $response['success'] = false;
            $response['error'] = array(
                'code' => 400,
                'message' => "Error en la solicitud",
                'details' => "Ingrese nombre del producto"
            );
            Flight::json($response, 400);
        }

        $productBybarcode = $productModel->getDataByBarcode($barcode);
        if($productBybarcode) {
            $response['success'] = false;
            $response['error'] = array(
                'code' => 400,
                'message' => "Error en la solicitud",
                'details' => "Este codigo de barra ya lo esta usando otro producto. (" . $productBybarcode['name']. ")"
            );
            Flight::json($response, 400);
        }

        $product = array(
            'name' => $name,
            'price' => Flight::request()->data->price,
            'barcode' => $barcode,
            'id_shop' => Flight::request()->data->id_shop,
        );


        $id = $productModel->add($product);
        if ($id > 0) {
            $prod = $productModel->getDataById($id);
            $response['success'] = true;
            $response['message'] = "El producto ha sido creado exitosamente.";
            $response['data'] = $prod;
            Flight::json($response, 201);
        }

        $response['success'] = false;
        $response['error'] = array(
            'code' => 400,
            'message' => "Error en la solicitud",
            'details' => "El código de barras proporcionado es inválido o el producto no cumple con los requisitos."
        );

        Flight::json($response, 400);
    }

    public static function updateProduct($id)
    {
        $productModel = new ProductModel($id);
        if (empty(Flight::request()->data->name))
            Flight::json(['message' => 'Ingrese nombre del producto'], 400);

        $productModel->name = Flight::request()->data->name;
        $productModel->price = Flight::request()->data->price;
        $productModel->barcode = Flight::request()->data->barcode;
        $productModel->id_shop = Flight::request()->data->id_shop;
        $productModel->date_upd = date("Y-m-d H:i:s");

        if($productModel->update()) {
            $prod = $productModel->getDataById($id);
            $response['success'] = true;
            $response['message'] = "El producto ha sido actualizado exitosamente.";
            $response['data'] = $prod;
            Flight::json($response, 202);
        }

        $response['success'] = false;
        $response['error'] = array(
            'code' => 400,
            'message' => "Error en la solicitud",
            'details' => "El código de barras proporcionado es inválido o el producto no existe."
        );

        Flight::json($response, 400);
    }


    public static function getProduct($id)
    {
        $productModel = new ProductModel();
        $prod = $productModel->getDataById($id);
        if ($prod) {
            $response['success'] = true;
            $response['data'] = $prod;
            Flight::json($response);
        }

        $response['success'] = false;
        $response['error'] = array(
            'code' => 404,
            'message' => "Producto no encontrado"
        );
        Flight::json($response, 404);
    }

    public static function getProductByBarcode($barcode)
    {
        $productModel = new ProductModel();
        $prod = $productModel->getDataByBarcode($barcode);
        if ($prod) {
            $response['success'] = true;
            $response['data'] = $prod;
            Flight::json($response);
        }

        $response['success'] = false;
        $response['error'] = array(
            'code' => 404,
            'message' => "Producto no encontrado"
        );
        Flight::json($response, 404);
    }

    public static function deleteProduct($id)
    {
        $productModel = new ProductModel($id);
        $prod = $productModel->delete();

        if ($prod) {
            $response['success'] = true;
            $response['message'] = "El producto ha sido eliminado exitosamente: " . $id;
            Flight::json($response, 202);
        }

        $response['success'] = false;
        $response['error'] = array(
            'code' => 404,
            'message' => "El producto no se encontró o no se pudo eliminar."
        );
        Flight::json($response, 404);
    }

}

$oProductApiController = new ProductApiController();
Flight::route('GET /api/v1/products', array($oProductApiController, 'getProducts'));
Flight::route('GET /api/v1/products/barcode/@barcode',  array($oProductApiController, 'getProductByBarcode'));
Flight::route('GET /api/v1/products/@id',  array($oProductApiController, 'getProduct'));
Flight::route('POST /api/v1/products',  array($oProductApiController, 'createProduct'));
Flight::route('PUT /api/v1/products/@id',  array($oProductApiController, 'updateProduct'));
Flight::route('DELETE /api/v1/products/@id',  array($oProductApiController, 'deleteProduct'));
