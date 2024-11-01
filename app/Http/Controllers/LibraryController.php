<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    // Borrow books function
    public function borrow(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id', 
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid user or book id']);
        }

        $userId = $request->input('user_id');
        $bookId = $request->input('book_id');

        $book = Book::find($bookId);
        
        $borrowedCount= Borrow::where('user_id', $userId)->where('is_returned', false)->count();
        $borrowedLimit = 20;
        if ($borrowedCount >= $borrowedLimit) {
            return response()->json(['error'=>'You have reached your borrowing limit']);
        }

        $due_date = now()-addWeeks(2);
        $borrow = Borrow::create([
            'user_id' => $userId,
            'book_id' => $bookId,
            'borrowed_at' => now(),
            'due_date' => $dueDate,
            'is_returned' => false,
        ]);

        $book->save();

        // Step 6: Return Success Response
        return response()->json([
            'message' => 'Book borrowed successfully',
            'borrow_id' => $borrow->id,
            'due_date' => $borrow->due_date->toDateString(),
        ], 200);
    }
}