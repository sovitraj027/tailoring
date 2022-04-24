<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;


class RatingController extends Controller
{
  
    public function addRating(Request $request)
        {
            Rating::updateOrCreate(
                ['user_id' => $request->user_id, 'tailor_id' => $request->tailor_id],
                ['rating' => $request->rating,]
            );
        }


        
}
