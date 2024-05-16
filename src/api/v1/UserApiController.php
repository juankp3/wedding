<?php
require_once dirname(__FILE__) . '/../../models/UserModel.php';

class UserApiController
{

    public static function getUsers()
    {
        // echo "<pre>";
        // var_dump('ss');
        // echo "</pre>";
        // exit;
        $request = Flight::request();
        $offset = $request->query['offset'] ?? 0;
        $limit = $request->query['limit'] ?? 10 ;

        $currentUrl = 'http://localhost:4000/api/v1/users';
        $userModel = new UserModel();
        $totalUsers = $userModel->getUsers();

        $nextPageOffset = $offset + $limit;
        $previousPageOffset = max(0, $offset - $limit);
        $hasNextPage = $nextPageOffset < count($totalUsers);

        $users['success'] = true;
        $users['data'] = $userModel->getUsers($offset, $limit);
        $users['pagination'] = array(
            'count' => count($totalUsers),
            'next' => $hasNextPage ? $currentUrl . "?offset=$nextPageOffset&limit=$limit" : null,
            'previous' =>  $offset > 0 ? $currentUrl . "?offset=$previousPageOffset&limit=$limit" : null,
        );

        Flight::json($users);
    }

    public static function createUser()
    {
        $userModel = new UserModel();
        $userModel->firstname = Flight::request()->data->firstname;
        $userModel->lastname = Flight::request()->data->lastname;
        $userModel->email = Flight::request()->data->email;
        $userModel->passwd = Flight::request()->data->passwd;
        $userModel->type = Flight::request()->data->type;
        $userModel->active = Flight::request()->data->active;
        $userModel->id_shop = Flight::request()->data->id_shop;

        $response = $userModel->createUser();

        if ($response['success']) {
            $response['message'] = "El usuario ha sido creado exitosamente.";
            Flight::json($response, 201);
        }

        $response['error']['code'] = 409;
        $response['error']['details'] = "El usuario no cumple con los requisitos.";

        Flight::json($response, 409);
    }

    // TODO: validar que el correo sea unico
    public static function updateUser($id)
    {
        $userModel = new UserModel($id);
        if (empty(Flight::request()->data->firstname))
            Flight::json(['message' => 'Ingrese nombre del usuario'], 400);

        $userModel->firstname   = Flight::request()->data->firstname;
        $userModel->lastname    = Flight::request()->data->lastname;
        $userModel->email       = Flight::request()->data->email;
        $userModel->passwd      = Flight::request()->data->passwd;
        $userModel->type        = Flight::request()->data->type;
        $userModel->active      = Flight::request()->data->active;
        $userModel->id_shop     = Flight::request()->data->id_shop;
        $userModel->date_upd    = date("Y-m-d H:i:s");

        if($userModel->update()) {
            $user = $userModel->getDataById($id);
            $response['success'] = true;
            $response['message'] = "El usuario ha sido actualizado exitosamente.";
            $response['data'] = $user;
            Flight::json($response, 202);
        }

        $response['success'] = false;
        $response['error'] = array(
            'code' => 400,
            'message' => "Error en la solicitud",
            'details' => "El usuario no existe."
        );

        Flight::json($response, 400);
    }

    public static function deleteUser($id)
    {
        $userModel = new UserModel($id);
        $user = $userModel->delete();

        if ($user) {
            $response['success'] = true;
            $response['message'] = "El usuario ha sido eliminado exitosamente: " . $id;
            Flight::json($response, 202);
        }

        $response['success'] = false;
        $response['error'] = array(
            'code' => 404,
            'message' => "El usuario no se encontró o no se pudo eliminar."
        );
        Flight::json($response, 404);
    }

    public static function getUser($id)
    {
        $userModel = new UserModel($id);
        $user = $userModel->getDataById($id);
        if ($user) {
            $response['success'] = true;
            $response['data'] = $user;
            Flight::json($response);
        }

        $response['success'] = false;
        $response['error'] = array(
            'code' => 404,
            'message' => "usuario no encontrado"
        );
        Flight::json($response, 404);
    }

    public static function login()
    {
        $userModel = new UserModel();
        $userModel->email = Flight::request()->data->email;
        $userModel->passwd = Flight::request()->data->passwd;
        $response = $userModel->login();

        if ($response['success']){
            Flight::json($response, 200);
        }

        Flight::json($response, 401);
    }
}

$oUserApiController = new UserApiController();
Flight::route('GET /api/v1/users', array($oUserApiController, 'getUsers'));
Flight::route('GET /api/v1/users/@id',  array($oUserApiController, 'getUser'));
Flight::route('POST /api/v1/users',  array($oUserApiController, 'createUser'));
Flight::route('POST /api/v1/users/login',  array($oUserApiController, 'login'));
Flight::route('PUT /api/v1/users/@id',  array($oUserApiController, 'updateUser'));
Flight::route('DELETE /api/v1/users/@id',  array($oUserApiController, 'deleteUser'));
    