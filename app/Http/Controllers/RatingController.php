<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function saveRating(Request $request, $id)
    {
        if ($request->ajax())
        {
            $r = Rating::where('ra_product_id',$id)->where('ra_user_id',get_data_user('web'))->first();
            if ($r)
            {
                return response()->json(['code' => 0]);
            }
            else
            {
                $rating = new Rating();
                $rating->ra_product_id = $id;
                $rating->ra_number     = $request->ra_number;
                $rating->ra_content    = $request->ra_content;
                $rating->ra_user_id    = get_data_user('web');
                $rating->save();
                $product = Product::find($id);
                $product->p_total_number += $request->ra_number;
                $product->p_total_rating += 1;
                $product->save();
                return response()->json(['code' => 1]);
            }
        }
    }
}
