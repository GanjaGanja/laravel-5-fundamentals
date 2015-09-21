<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about() {

		//1st variant
    	$name = 'Ochenj <span style="color: #D44D4D;">Gorkyj</span>';
    	return view('pages.about')->with('name', $name);
    }

    public function about2() {
        
        //2nd variant
        return view('pages.about2')->with([
          'first' => 'Vmeru',
          'last' => 'Gorkyj'
          ]);
    }

    public function about3() {

        //3rd variant
        $data = [];
        $data['first'] = 'Not';
        $data['last'] = 'Gorkyj';
        return view('pages.about3', $data);
    }

    public function about4() {

        //4th variant
        $first = 'Super';
        $last = 'Gorkyj';
        return view('pages.about4', compact('first', 'last'));
    }
}
