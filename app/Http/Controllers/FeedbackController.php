<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Simple validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            // Return errors as JSON for the AJAX call
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // TODO: Save the feedback to the database or send an email here.

        // Example success response
        return response()->json([
            'message' => 'Feedback received successfully.'
        ]);
    }
}