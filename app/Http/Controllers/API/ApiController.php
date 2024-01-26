<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    //
    public function contributions(String $id){

        $contributions = Contribution::where("user_id", $id)->orderBy("created_at")->get();
        

        return response()->json($contributions, 200);

    }


  /**
     *Contributiion
     */

    /**
     * @OA\Post(
     * path="/api/contribute",
     * operationId="Contribution",
     * tags={"Contribution"},
     * summary="User Contribution",
     * description="User Login here",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"amount","id", "description"},
     *               @OA\Property(property="amount", type="text"),
     *                  @OA\Property(property="id", type="text"),
     *               @OA\Property(property="description", type="text"),
     *            ),
     *        ),
     *    ),
     *     @OA\Response(response="200", description="Login successful"),
     *     @OA\Response(response="401", description="Invalid credentials")
     * )
     */
    public function makeContribution(Request $request){
        // try {
        $data = $request->all();
        $validation = Validator::make($data, [
            [
                'amount' => ['required', 'numeric'],
                'description' => ['required', 'min:3'],
            ]
        ]);
        $contribute = Contribution::create([
            'amount'=> $data['amount'],
            'description'=> $data['description'],
            'user_id'=> $data['user_id'],
            'status'=> Contribution::CONTRIBUTION_STATUS_PENDING,
        ]);
        // print($data['id']);
        return response()->json($contribute, 200);  

     
    // } catch (\Exception $e) {
    //     print_r($e->getMessage());
    // }
       


    }
}
