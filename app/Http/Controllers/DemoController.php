<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function demo()
    {
        /**
         * Display days display at last 2 category add in post table recorded.
        */
        return Category::with(['post'])->has('post', '=', 2)->get();

        /**
         * Display length = 3 in category table, created before 5 days & post have list 2 tag in post table recorded.
        */
        return Category::with(['post.tags'])->whereRaw('LENGTH(name) = 3')->whereHas('post', function ($query) {
            $query->whereDate('created_at', Carbon::now()->subDays(5))
                ->has('tags', '=', 2 );
        })->get();
    }
}
