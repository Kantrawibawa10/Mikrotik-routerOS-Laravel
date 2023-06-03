<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\API;

class APIController extends Controller
{
    public function index()
    {
        try {
            $data = [
                'api' => API::latest()->get(),
            ];

            return view('odp.index', $data);
        } catch (\Throwable $e) {
            // Redirect to the error page
            return view('error.maintenece');
        }
    }
}
