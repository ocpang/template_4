<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\BusinessCLient;

class DatatablesController extends Controller
{
	public function index($value='')
	{
		# code...
	}
    public function businessData()
    {
        return Datatables::of(BusinessClient::query())
        	->addIndexColumn()
        	->addColumn('company', function ($row) 
                    {
                        //change over here
                        return $row->company_name;
                    })
        	->make(true);
    }
}
