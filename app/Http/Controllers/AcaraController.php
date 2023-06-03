<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\Tamu;

class AcaraController extends Controller
{
    public function index()
    {
        $acara = Acara::all();
        return view('acara.index', compact('acara'));
    }

    public function create()
    {
        return view('acara.create');
    }

    public function store(Request $request)
    {
       
        $input = $request->all();
        if ($image = $request->file('gambar')) {
            $destinationPath = 'images/';
            $nama = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $nama);
            $input['gambar'] = "$nama";
        }
        Acara::create($input);
        return redirect()->route('acara.index')->with('success', 'Acara created successfully.');
    }

    public function show(Acara $acara)
    {
        $tamu = Tamu::all();
        return view('acara.show', compact('acara','tamu'));
    }

    public function edit(Acara $acara)
    {
        return view('acara.edit', compact('acara'));
    }

    public function update(Request $request, Acara $acara)
    {

        $input = $request->all();

        if($image = $request->file('gambar')) {
            $destinationPath = 'images/';
            $nama = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $nama);
            $input['gambar'] = $nama;
        }

        $acara->update($input); // Update the acara data
        return redirect()->route('acara.index')->with('success', 'Acara created successfully.');
    }

    public function destroy(Acara $acara)
    {
        $acara->delete();

        return redirect()->route('acara.index')->with('success', 'Acara deleted successfully.');
    }
}
