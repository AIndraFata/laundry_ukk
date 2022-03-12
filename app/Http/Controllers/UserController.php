<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;   
use JWTAuth;
use Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function show_register()
    {
        return view('register.index_register');
    }

    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name'      => 'required|string|max:255',
    //         'email'     => 'required|string|email|max:255|unique:users',
    //         'username'  => 'required|string|max:255',
    //         'password'  => 'required|string|min:6|confirmed',
    //         'role'      => 'required',
    //     ]);
    //     if($validator->fails()){
    //         return response()->json($validator->errors()->toJson(), 400);
    //     }
    //     $user = User::create([
    //         'name'      => $request->get('name'),
    //         'email'     => $request->get('email'),
    //         'username'  => $request->get('username'),
    //         'password'  => Hash::make($request->get('password')),
    //         'role'      => $request->get('role'),
    //     ]);
    //     $token = JWTAuth::fromUser($user);
    //     return response()->json(compact('user','token'),201);
    // }

    public function show_login()
    {
        return view('login.index_login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('username', 'password');
    //     try {
    //         if (! $token = JWTAuth::attempt($credentials)) {
    //             return response()->json(['error' => 'invalid_credentials'], 400);
    //         }
    //     } catch (JWTException $e) {
    //         return response()->json(['error' => 'could_not_create_token'], 500);
    //     }
    //     return response()->json(compact('token'));
    // }

    // public function logout(Request $req)
    // {
    //     $this->validate($req, ['token' => 'required']);
    //     try
    //     {
    //         JWTAuth::invalidate($req->input('token'));
    //         return Response()->json(['Success' => true, 'status' => 'Berhasil Logout']);
    //     }
    //     catch(JWTException $e)
    //     {
    //         return Response()->json(['success' => false, 'status' => 'Gagal Logout'], 500);
    //     }
    // }

    // public function getAuthenticatedUser()
    // {
    //     try {
    //         if (! $user = JWTAuth::parseToken()->authenticate()) {
    //             return Response()->json(['user_not_found'], 404);
    //         }
    //     } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
    //         return Response()->json(['token_expired'], $e->getStatusCode());
    //     } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
    //         return Response()->json(['token_invalid'], $e->getStatusCode());
    //     } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
    //         return Response()->json(['token_absent'], $e->getStatusCode());
    //     }
    //     return Response()->json(compact('user'));
    // }
    
    // public function getprofileowner()
    // {
    //    return Response()->json(JWTAuth::user());
    // }

    // public function getprofileadmin()
    // {
    //     return Response()->json(JWTAuth::user());
    // }
}

