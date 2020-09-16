<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepositoryEloquent;
use App\Repositories\Sms\SmsRepositoryEloquent;

class UserController extends Controller
{

    private $user;
    private $sms;

    public function __construct() {
        $this->user =   new UserRepositoryEloquent;
        $this->sms  =   new SmsRepositoryEloquent;
    }

    public function check(Request $request) {
        return $this->user->check($request->all());
    }

    public function auth(Request $request) {
        return $this->user->auth($request->all());
    }

    public function save(Request $request) {
        $code = $this->user->save($request->all());
        $this->sms->sendCode($code);
    }

}
