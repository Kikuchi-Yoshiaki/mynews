<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Profile;  # Profile Modelを使う -> app/Http/Profile.php

class ProfileController extends Controller
{
    
    
    public function index(Request $request)
    {
        $posts = Profile::all()->sortBy('updated_at');
    
        if (count($posts) > 0) {
            $profilelist = $posts;
        } else {
            $profilelist = null;
        }
    
        // news/index.blade.php ファイルを渡している
        // また View テンプレートに profilelist、 posts、という変数を渡している
        return view('profile.index', ['profirelist' => $profilelist, 'posts' => $posts]);
    }
    
}