<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAccountRequest;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginAccountRequest $request)
    {
        if(Auth::attemp($request))
        {
            $user = Account::where('account_email',$request->account_email)
            ->where('account_password',$request->account_password)
            ->first();

            $token = $user->createToken('toke-name')->plainTextToken;
            return response()->json([
                'token' => $token
            ],200);
        }else{
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
