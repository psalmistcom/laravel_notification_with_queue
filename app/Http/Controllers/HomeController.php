<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function index() {
        $users = User::get();

        $post = [
            'title'=> 'Post title', 
            'slug' => 'post-slug'
        ];

        foreach($users as $user){
            $user->notify(new WelcomeNotification($post));
            // Notification::send($user, new WelcomeNotification($post));
        }
        dd('done');
        // return view('welcome');
    }
}
