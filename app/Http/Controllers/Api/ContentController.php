<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use Validator;
use IlluminateHttpRequest;
use AppHttpRequestsRegisterAuthRequest;
use TymonJWTAuthExceptionsJWTException;
use SymfonyComponentHttpFoundationResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\ManageArticle;


class ContentController extends Controller
{


    public function get_article()
    {
        try{
            $get_article            = ManageArticle::get()->toArray();
            $response['code']       = 200;
            $response['status']     = 'success';
            $response['data']       = $get_article;
            return response()->json($response);
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['message' => 'Something went wrong, Please try again later.', 'code' => 400]);
        }
    }



}
