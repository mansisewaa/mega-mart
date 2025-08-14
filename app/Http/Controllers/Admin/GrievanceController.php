<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grievance;
use Illuminate\Http\Request;

class GrievanceController extends Controller
{
    public function index()
    {
        $records = Grievance::all();
        return view('backend.grievance.index',compact('records'));
    }
}
