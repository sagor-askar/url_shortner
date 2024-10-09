<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shortlink;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function index()
    {
        $shortlink = Shortlink::latest()->get();
        return view('shortlink', compact('shortlink'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);
        
        $input['link'] = $request->link;
        $input['code'] = Str::random(6);

        Shortlink::create($input);

        return redirect('shortlink')
                ->with('success', 'Short Link Generated Successfully!');
    }

    public function shortLink($code)
    {
        $find = Shortlink::where('code', $code)->first();
        if(!$find) {
            return redirect('short-link')->with('errpr', 'Short Code Not Found!!');
        }

        // click count
        $find->incrementClicks();
        
        return redirect($find->link);
    }
}
