<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CurrentUserController extends Controller
{
    /**
     * Handle the current user request.
     *
     * @verb GET
     * @route /api/profile/current-user
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        try {
            return response()
                ->json(
                    data: [
                        'message' => 'Success.',
                        'data' => [
                            'user' => $request->user(),
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
