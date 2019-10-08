<?php

public function login (Request $request) {

    $user = User::where('email', $request->email)->first();

    if ($user) {

        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token' => $token];
            return response($response, 200);
        } else {
            $response = "Password missmatch";
            return response($response, 422);
        }

    } else {
        $response = 'User does not exist';
        return response($response, 422);
    }

}
