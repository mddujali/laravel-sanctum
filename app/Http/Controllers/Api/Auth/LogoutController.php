<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class LogoutController extends Controller
{
    /**
     * Handle the logout request.
     *
     * @verb POST
     * @route /api/auth/logout
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->user()
                ->currentAccessToken()
                ->delete();

            DB::commit();

            return response()->json(
                data: ['message' => 'Success.'],
                status: Response::HTTP_OK
            );
        } catch (Exception) {
            DB::rollBack();

            return response()
                ->json(
                    data: ['message' => 'Server error.'],
                    status: Response::HTTP_INTERNAL_SERVER_ERROR
                );
        }
    }
}
