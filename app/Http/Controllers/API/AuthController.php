<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
  //
    /**
     * @OA\Post(
     * path="/api/register",
     * operationId="Register",
     * tags={"Register"},
     * summary="User Register",
     * description="User Register here",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"firstName","lastName","phone","email", "password"},
     *               @OA\Property(property="firstName", type="text"),
     *               @OA\Property(property="lastName", type="text"),
     *               @OA\Property(property="phone", type="text"),
     *               @OA\Property(property="email", type="text"),
     *               @OA\Property(property="password", type="password"),
     *            ),
     *        ),
     *    ),
     *     @OA\Response(response="201", description="User registered successfully"),
     *     @OA\Response(response="422", description="Validation errors")
     * )
     */
    public function register(Request $request)
    {

        $data = $request->all();
        $validation = Validator::make($data, [
            'firstName' => ['required', 'string','min:3',  'max:255'],
            'lastName' => ['required', 'string','min:3', 'max:255'],
            'phone' => ['required', 'string','min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($validation->passes()) {
            $user = User::create([
                'first_name' => $data['firstName'],
                'last_name' => $data['lastName'],
                'email' => $data['email'],
                'phone' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);

            $token = $user->createToken('ORGMS')->accessToken;
            $userData = [
                'firstName' => $user->first_name,
                'lastName' => $user->last_name,
                'email' =>  $user->email,
                'phone'=>$user->phone];

            return response()->json([
                'success' => true,
                'token' => $token,
                'id'=> $user->id,
                'firstName' => $user->first_name,
                'lastName' => $user->last_name,
                'email' =>  $user->email,
                'phone'=>$user->phone], 200);
        }else{
            return response()->json([
                'success' => false,
                'error' =>$validation->errors()->first()
            ], 400);
        }

    }

  /**
     * Login
     */

    /**
     * @OA\Post(
     * path="/api/login",
     * operationId="Login",
     * tags={"Login"},
     * summary="User Login",
     * description="User Login here",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"email", "password"},
     *               @OA\Property(property="email", type="text"),
     *               @OA\Property(property="password", type="password"),
     *            ),
     *        ),
     *    ),
     *     @OA\Response(response="200", description="Login successful"),
     *     @OA\Response(response="401", description="Invalid credentials")
     * )
     */
    
    public function login(Request $request)
    {
        $data = $request->all();
        $validation = Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('ORGMS')->accessToken;
            $user = auth()->user();
            $userData = [
                'id'=> $user->id,
                'firstName' => $user->first_name,
                'lastName' => $user->last_name,
                'email' =>  $user->email,
                'phone'=>$user->phone];

            return response()->json([
                'success' => true,
                'token' => $token,
                'id'=> $user->id,
                'firstName' => $user->first_name,
                'lastName' => $user->last_name,
                'email' =>  $user->email,
                'phone'=>$user->phone], 200);
        } else {
            if ($validation->errors()->first()){
                return response()->json([
                    'success' => false,
                    'error' => $validation->errors()->first()], 401);
            }else{
                return response()->json([
                    'success' => false,
                    'error' => "Incorrect credentials"], 401);
            }

        }
    }
    public function getUser(Request $request, $id)
    {
        $user = User::find($id);
        return response()->json([
            'success' => true,
            'id'=> $user->id,
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'email' =>  $user->email,
            'phone'=>$user->phone], 200);



    }

    public function logout (Request $request) {
        $token = $request->user()->token;
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
