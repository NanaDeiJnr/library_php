<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getBooks(Request $request)
    {
        $query = $request->input('query');

        $response = Http::withoutVerifying()->get('https://www.googleapis.com/books/v1/volumes', [
            'q' => $query,
            'key' => env('GOOGLE_BOOKS_API_KEY'),
        ]);

        if ($response->successful()) {
            return response()->json($response->json(), 200);
        }

        return response()->json(['error'=> 'unable to fetch books'], $response->status());
    }
}
