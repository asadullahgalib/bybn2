<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;

class DefaultController extends Controller
{
	

	public function PageNotFound()
	{
		return view('backend.unauthorize');
	}

}
