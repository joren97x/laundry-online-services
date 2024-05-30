<?php

namespace App\Http\Controllers;

use App\Models\CustomerReview;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
   public function saveRating(Request $request) {

        $request->validate([
            'rating' => 'required',
            'comment' => 'required'
        ]);

        CustomerReview::create([
            'user_id' => Auth::user()->id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return response(['message' => 'Successfully rated', 'review' => $request->all()]);

   }

    public function index() {
        return view('admin.reviews', ['reviews' => CustomerReview::with('user')->where('status', false)->get()]);
    }

    public function approve(CustomerReview $review) {
        $review->status = true;
        $review->update();
        return back();
    }

    public function destroy(CustomerReview $review, Request $request) {
        $review->delete();
        return back();
    }

}
