<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    
    public function index(){
        
        $users = [
            [
                'name' => 'Alex',
                'age' => 30
            ],
            [
                'name' => 'Dan',
                'age' => 25
            ],
            [
                'name' => 'John',
                'age' => 17
            ],
            
        ];

        return view('dashboard',
            [
                'users' => $users
            ]
        );
    }
}
