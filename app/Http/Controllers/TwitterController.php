<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwitterController extends Controller
{
    //
    public function index(){
        $data=[];
        if(\Auth::check()){
            $user=\Auth::user();
            $twitter=$user->feed_twitter()->orderBy('created_at','desc')->paginate(10);
            $favorites=$user->favorites()->orderBy('created_at','desc')->paginate(10);
            $data=[
                'user'=>$user,
                'twitter'=>$twitter,
                'favorites'=>$favorites,
                ];
        }
        return view('welcome',$data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'content'=>'required|max:191',]);
        $request->user()->twitter()->create([
            'content'=>$request->content,]);
        return back();
    }
    public function destroy($id)
    {
        $tweet=\App\Twitter::find($id);
        if(\Auth::id()===$tweet->user_id){
            $tweet->delete();
        }
        return back();
    }
    
    
}
