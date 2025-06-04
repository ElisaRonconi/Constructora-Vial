<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
  
public function index()
{
    $machines = \App\Models\Machine::with([
        'assignments.work.province' => function ($query) {
            $query->select('id', 'name'); 
        }
    ])->get();

    return view('tracking.index', compact('machines'));
}
}