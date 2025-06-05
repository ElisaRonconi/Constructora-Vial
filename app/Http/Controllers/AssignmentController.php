<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Machine;
use App\Models\Work;
use App\Models\Alert;
use Illuminate\Http\Request;
use App\Events\Machine500Km;

class AssignmentController extends Controller
{

   
    public function index()
    {
        $assignments = Assignment::orderBy('created_at', 'desc')->paginate(10);
        return view('assignments.index', compact('assignments'));
    }

   
    public function create()
    {
        $machines= Machine::whereDoesntHave('asignacionActiva')->get();
        $works=Work::all();
        return view('assignments.create', compact ('machines','works'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'serial_machine' => 'required|exists:machines,serial',
            'id_work' => 'required|exists:works,id',
            'data_start'=> 'required|date',
            'data_end'=> 'nullable|date|after_or_equal:data_start',
            'kilometers' => 'nullable|numeric|min:0',
            'id_reason' => 'nullable|string',
            
        ]);
        $machine= Machine::find($request->serial_machine);

            if($machine->asignacionActiva){
                return back()->withErrors(['serial_machine'=>'La máquina ya está asignada.'])->withInput();
            }

        Assignment::create($validated);

        return redirect()->route('assignments.index')->with('success', 'Asignación creada correctaemnte.');
    }

   
    public function show(Assignment $assignment)
    {
        return view('assignments.show', compact('assignment'));
    }

 
    public function edit(Assignment $assignment)
    {
        return view('assignments.edit', compact('assignment'));
    }

    public function update(Request $request, $serial)
{
    $request->validate([
        'kilometers' => 'required|numeric|min:0',
        'data_end' => 'nullable|date', 
    ]);

    $assignment = Assignment::where('serial_machine', $serial)->latest()->firstOrFail();
    $assignment->kilometers = $request->kilometers;
    $assignment->data_end = $request->data_end;
    $assignment->save();

    // Verificamos si supera los 500 km
    if ($assignment->kilometers >= 500) {
        $alertaExistente = Alert::where('id_assignment', $assignment->id)->first();

        if (!$alertaExistente) {
            Alert::create([
                'id_assignment' => $assignment->id,
                'message' => 'La máquina superó los 500 km y requiere mantenimiento.',
            ]);

            Notification::route('mail', 'admin@example.com')
                ->notify(new MantenimientoNotification($assignment));
        }
    }

    return redirect()->route('assignments.index')->with('success', 'Asignación actualizada correctamente.');
}

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return redirect()->route('assignments.index')->with('success', 'Asignación eliminada.');
    }
}
