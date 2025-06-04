<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;

class MaintenanceController extends Controller
{
    public function index()
{   
$alerts = Alert::with('assignment.machine', 'assignment.work.province')->latest()->get();
return view('maintenance.index', compact('alerts'));
}
    
}
