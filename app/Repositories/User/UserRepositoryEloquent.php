<?php

namespace App\Repositories\User;

use App\Contracts\User\UserContract;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepositoryEloquent implements UserRepositoryInterface
{
    public function auth($request) {
        $phone          =   $request['phone'];
        $password       =   $request['password'];
        $credentials    =   [
            UserContract::PHONE    => $phone,
            UserContract::PASSWORD => $password,
        ];
        if (Auth::attempt($credentials)) {
            return response(Auth::id(),200);
        }
        return response('Unauthorized',401);
    }

    public function save($request) {
        $code = mt_rand(100000, 999999);
        User::create([
            UserContract::PHONE         =>  $request['phone'],
            UserContract::PHONE_CODE    =>  $code,
            UserContract::PASSWORD      =>  Hash::make($request['password']),
        ]);
        return $code;
    }

    public function check($request) {
        $phone  =   $request['phone'];
        $user   =   User::where(UserContract::PHONE,$phone);
        if ($user) {
            return response($user,200);
        }
        return response(['message'  =>  'Not found'],404);
    }
}
