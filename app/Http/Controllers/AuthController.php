<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');
        if ($token = auth()->attempt($credentials, ['exp' => Carbon::now()->addYears(1)->timestamp])) {
            return response()->json(['token' => $token, 'role' => auth()->user()->role->title]);
        }
        return response()->json(['error' => 'Неправильный логин или пароль']);
    }
}
