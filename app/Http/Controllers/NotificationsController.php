<?php

namespace App\Http\Controllers;

class NotificationsController extends Controller
{
    public function index()
    {
        return \App\Models\User::first()->notifications()->paginate(5);
    }
}
