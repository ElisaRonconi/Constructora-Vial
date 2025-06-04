<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
   
    public function index()
    {
    $machines = Machine::with(['assignments.work.province'])->paginate(10);

    return view('machines.index', compact('machines'));

        $machines = Machine::orderBy('created_at', 'desc')->paginate(10);
        return view('machines.index', compact('machines'));
    }

   
    public function create()
    {
        return view('machines.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'serial' => 'required|string|unique:machines,serial',
            'type' => 'required|string',
            'brand_model' => 'required|string',
        ]);
        Machine::create($data);
        return redirect()->route('machines.index')->with('success', 'Máquina creada.');
    }

   
    public function show(Machine $machine)
    {
     
    $machine->load(['assignments.work.province']); 

    $asignacionActual = $machine->assignments->firstWhere('data_end', null);

    return view('machines.show', compact('machine', 'asignacionActual'));
    }
    

 
    public function edit(Machine $machine)
    {
        return view('machines.edit', compact('machine'));
    }

    public function update(Request $request, Machine $machine)
    {
        $data = $request->validate([
            'type' => 'required|string',
            'brand_model' => 'required|string',
        ]);
        $machine->update($data);
        return redirect()->route('machines.index')->with('success', 'Máquina actualizada.');
    }


   public function destroy(Machine $machine)
{    
    $machine->delete();

    return redirect()->route('machines.index')->with('success', 'Máquina eliminada con éxito');
}
}