<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Assignment;
use App\Models\Machine;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
     $works = Work::with('province')  
        ->orderBy('date_start', 'desc')
        ->paginate(10);

    return view('works.index', compact('works'));
        $works = Work::orderBy('date_start','desc')->paginate(10);
        return view('works.index', compact('works'));
    }

    
    public function create()
    {
        return view('works.create');
    }

    
    public function store(Request $request)
    {
         $data = $request->validate([
        'name' => 'required|string|max:255',
        'id_province' => 'required|string|max:100',
        'date_start' => 'required|date',
        'date_end' => 'nullable|date|after_or_equal:date_start',
    ]);

    Work::create($data);
    return redirect()->route('works.index')->with('success', 'Obra creada correctamente.');

    }

   
    public function show(Work $work)
    {
      return view('works.show', compact('work'));

    }

    public function edit(Work $work)
    {
          return view('works.edit', compact('work'));
    }
  
    public function update(Request $request, Work $work)
    {
         $data = $request->validate([
        'name' => 'required|string|max:255',
        'id_province' => 'required|string|max:100',
        'date_start' => 'required|date',
        'date_end' => 'nullable|date|after_or_equal:date_start',
    ]);

    $work->update($data);
    return redirect()->route('works.index')->with('success', 'Obra actualizada correctamente.');

    }
    
    public function destroy(Work $work)
    {
         $work->delete();
    return redirect()->route('works.index')->with('success', 'Obra eliminada.');

    }
}
