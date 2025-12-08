<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $data = [
            "email" => "rakha@com",
            "phone" => "08123456789"
        ];
        return view("contact", compact('data'));
    }
}
