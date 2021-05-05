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
use App\UserNote;
use Auth;


class UserController extends Controller
{


    public function add_user_notes(Request $request)
    {
        $data = $request->all();
      

        try{
            $user = auth()->userOrFail();
            foreach ($data as $key => $value) {
                $add_user_note                      = new UserNote;
                $add_user_note->user_id             = $user->id;
                $add_user_note->date                = date('Y-m-d',strtotime($value['date']));
                $add_user_note->note                = $value['note'];
                $add_user_note->period_started_date = date('Y-m-d H:i:s',strtotime($value['period_started_date']));
                $add_user_note->period_ended_date   = date('Y-m-d H:i:s',strtotime($value['period_ended_date']));
                $add_user_note->flow                = $value['flow'];
                $add_user_note->took_medicine       = $value['took_medicine'];
                $add_user_note->intercourse         = $value['intercourse'];
                $add_user_note->masturbated         = $value['masturbated'];
                $add_user_note->weight              = $value['weight'];
                $add_user_note->height              = $value['height'];
                $add_user_note->mood                = serialize($value['mood']);
                $add_user_note->save();
            }
            $response['code']       = 200;
            $response['status']     = 'User Note Added successfully';
            return response()->json($response);
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['message' => 'Something went wrong, Please try again later.', 'code' => 400]);
        }
    }



}
