<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
    //
    public function index()
    {
    	$data = array(
    		'title_page'	=>	'List Business',
    		);
        return view('business/index', $data);
    }
}
