<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\BrithdayWish;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
          $user = User::find(1);
          $data = [
            "h1" => "Hi{{$user->name}}",
            "wish"  => "Happay Birthidy",
        ];
        $user->notify(new BrithdayWish($data));

        dd("Sends Notifications......");
    }
}
