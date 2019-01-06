<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PassportController extends Controller
{
    //
    public $successStatus = 200;
    public $errorStatus = 401;
    public $noFoundStatus = 404;
    public $badRequest = 400;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            $response['error'] = $validator->errors()->first();
            $status = false;
            return response()->json([
                'status'=> $status,
                'result' => $response
                ],$this->errorStatus);
        }
        $inputFields = $request->all();
        $user = User::firstOrNew(['email'=>$inputFields['email']]);
        $user->name = $inputFields['name'];
        $user->email = $inputFields['email'];
        $user->password = bcrypt($inputFields['password']);
        $user->country_id = 1;
        $user->save();
        $response['status'] = true;
        $response['message'] = 'You have successfuly register';
        $response['token'] = $user->createToken('MyApp')->accessToken;
        $response['user'] = $user;
        return response()->json(['result'=>$response],$this->successStatus);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>  'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = $validator->errors()->first();
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $response['status'] = true;
            $response['message'] = 'You have successfuly login';
            $response['token'] = $user->createToken('MyApp')->accessToken;
        } else {
            $response['status'] = false;
            $response['message'] = 'Your Email and Password is Invalid';
        }
        return $response;
    }

    public function geUserDetail()
    {
        $user = Auth::user();
        return [
            'success' => $user
        ];
    }
}
