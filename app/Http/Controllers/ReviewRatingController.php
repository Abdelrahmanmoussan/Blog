<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\ReviewRating;


class ReviewRatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comments' => 'required|alpha', // Ensures 'comments' is not null and contains only letters
            'star_rating' => 'required|integer|min:1|max:5', // Adjust based on your requirements
            'user_id' => 'nullable|exists:users,id',
        ]);

        // If validation passes, proceed to save the data
        $reviewRating = new ReviewRating();
        $reviewRating->comments = $request->comments;
        $reviewRating->star_rating = $request->star_rating;
        $reviewRating->user_id = $request->user_id;

        $reviewRating->save();

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }





}
