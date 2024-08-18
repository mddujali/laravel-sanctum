<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    /**
     * Handle the login request.
     *
     * @verb POST
     * @route /api/auth/login
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request)
    {
        try {
            $data = $request->validated();

            if (!auth()->attempt($data)) {
                return response()->json(
                    data: ['message' => 'Invalid credentials'],
                    status: Response::HTTP_UNAUTHORIZED
                );
            }

            return response()->json(
                data: [
                    'message' => 'Success.',
                    'data' => [
                        'token_type' => 'Bearer',
                        'access_token' => $request->user()
                            ->createToken($data['email'])
                            ->plainTextToken,
                    ],
                ],
                status: Response::HTTP_OK
            );
        } catch (Exception) {
            return response()
                ->json(
                    data: ['message' => 'Server error.'],
                    status: Response::HTTP_INTERNAL_SERVER_ERROR
                );
        }
    }
}
