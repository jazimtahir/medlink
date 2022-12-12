<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\UserReview;
use Illuminate\Http\Request;

class UserReviewController extends Controller
{
    public function index() {
        $myReviews = auth()->user()->my_reviews;
        $reviewsToMe = auth()->user()->reviews_to_me;
        $role = auth()->user()->roles->pluck('name')[0];
        $reviewable = [];
        if($role == 'doctor') {
            $appointments = auth()->user()->doctor->doneAppointments;
            foreach($appointments as $appointment) {
                $hasReview = UserReview::where('to_user_id', $appointment->patient->user->id)->where('from_user_id', $appointment->doctor->user->id)->first();
                if(!$hasReview) {
                    $reviewable[] = $appointment->patient->user;
                }
            };
        }
        elseif($role == 'patient') {
            $appointments = auth()->user()->patient->doneAppointments;
            foreach ($appointments as $appointment) {
                $hasReview = UserReview::where('to_user_id', $appointment->doctor->user->id)->where('from_user_id', $appointment->patient->user->id)->first();
                if (!$hasReview) {
                    $reviewable[] = $appointment->doctor->user;
                }
            }
        }
        return view('review.index')
            ->with('myReviews', $myReviews)
            ->with('reviewsToMe', $reviewsToMe)
            ->with('reviewable', $reviewable);
    }

    public function create(Request $request) {
        $request->validate([
            'user' => 'required|integer',
            'feedback' => 'required|string|max:30',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        UserReview::create([
            'to_user_id' => $request->user,
            'from_user_id' => auth()->id(),
            'feedback' => $request->feedback,
            'rating' => $request->rating
        ]);
        return redirect()->route('reviews');
    }
}
