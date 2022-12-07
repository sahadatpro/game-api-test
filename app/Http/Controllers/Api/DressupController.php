<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DressupResource;
use App\Models\Character;
use App\Models\CharcterDress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DressupController extends Controller
{
    public function dressupOrRemove(Request $request) {
        $validator = Validator::make($request->all(), [
            'shirt' => 'boolean',
            'pant' => 'boolean',
            'shoes' => 'boolean',
            'character_id' => 'required|exists:characters,id'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $data = $request->only(['shirt', 'pant', 'shoes']);

        $character = CharcterDress::updateOrCreate([
            'character_id' => $request->input('character_id')
        ], $data);

        return new DressupResource($character);
    }


    public function removeDressup(Request $request)
    {
        $request->validate([
            'shirt' => 'boolean',
            'pant' => 'boolean',
            'shoes' => 'boolean',
        ]);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}
