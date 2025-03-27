<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DashboardController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'totalEvents' => Event::count(),
            'totalBookings' => Booking::count(),
            'totalUsers' => User::count(),
        ]);
    }
}
