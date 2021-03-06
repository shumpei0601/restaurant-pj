<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mypage()
    {
        $likes = Like::where('user_id', Auth::id())->get();
        $user = Auth::user();
        $reservations = Reservation::where('user_id', Auth::id())->get();
        return view('home.mypage', compact('likes', 'user', 'reservations'));
    }

    public function delete(Request $request)
    {
        Reservation::where('id', $request->id)->where('user_id', Auth::id())->delete();
        return redirect('/mypage');
    }
}
