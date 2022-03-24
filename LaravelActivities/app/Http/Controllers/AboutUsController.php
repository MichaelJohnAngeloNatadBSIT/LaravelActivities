<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function __invoke(){

        $data = array(
            'img' => 'img/tanya-batt.jpg',
            'title'=>'Imperial 203rd Aerial Mage Battalion',
            'description'=>'A battalion lead by Tanya Von Degurechaff',
            'author'=>'Empire'
            );
        return view('about')->with($data);
        }
}
