<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller{
    
    public function __invoke(){

        $data = array(
            'img' => 'img/tanya.png',
            'title'=>'War Strategies with Tanya',
            'description'=>'Major Tanya Von Degurechaff of Imperial 203rd Aerial Mage Battalion',
            'author'=>'Empire'
            );
        return view('post')->with($data);
        }
}
