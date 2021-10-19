<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        $id = Auth::id();

        if ($request->hasFile("image")) {
            $filename = $request->image->getClientOriginalName();
            echo $filename;
            $request->image->storeAs('images', $filename, 'public');
            User::where("id", $id)->update(["avatar" => $filename]);
        }
        return redirect()->back();

    }
}
