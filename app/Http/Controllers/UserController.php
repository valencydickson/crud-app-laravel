<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        $id = Auth::id();
        if ($request->hasFile("image")) {
            $this->deleteAvatar();
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            User::where("id", $id)->update(["avatar" => $filename]);
            $request->session()->flash('uploadMessage', 'Avatar was successful changed!');
        }
        return redirect()->back();
    }
    //delete existing image
    protected function deleteAvatar()
    {
        if (Auth::user()->avatar) {
            Storage::delete("/public/images/" . Auth::user()->avatar);
        }
    }
}
