<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Like;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $liked_user_id = $request->input('liked_user_id');

        
        if ($user_id == 'user_id' && $liked_user_id == 'liked_user_id') {


            // Warum funzt das nicht?
            return response('Already liked.');

        } else {

            Like::create([
                'user_id' => $user_id, 
                'liked_user_id' => $request->get('liked_user_id'),
            ]);

        }

        return response('', 204);
    }


    // Gib mir alle User, die meinen Account geliket haben
    public function indexLikes($var){
        $results = mysql_query("SELECT * FROM likes WHERE 'liked_user_id'='id'");
        $row = mysql_fetch_object($query);
        return $row->$var;    
    }


    
    public function indexLikingUsers(Like $like)
    {
        return view('partial.likinguser', compact('like'));
    }

    
}
