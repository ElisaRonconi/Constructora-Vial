<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Machine;
use App\Models\Work;
use App\Models\Province;

class TrackingController extends Controller
{
    

    public function index(){
        $machines = Machine::with(['assignments.work.province'])->get();

        return view('tracking.index', compact('machines'));
    }
    public function result(Request $request){
        $request->validate(['serial_machine'=>'required|exists:machines,serial',]);
        $machine=Machine::where('serial',$request->serial_machine)->fisrt();
        $assignment=$machine?->asignacionActiva;
        $province=$assignment?->work?->province;

        
        return view('trackingMachine.result', compact('machine','assignment',province));
    }
}
