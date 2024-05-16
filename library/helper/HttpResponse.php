<?php
class HttpResponse
{
    public static function test()
    {
        return "Hola mundo";
    }

    public static function success($data)
    {
        $response['success'] = true;
        $response['data'] = $data['data'];
        $response['message'] = $data['message'];

        return $response;
        // return Flight::json($response, $code);
    }

    public static function error($data, $code = 401)
    {
        $response['success'] = false;
        $response['error'] = array(
            'code' => $code,
            'message' => $data['message']
        );

        return $response;
    }
}
