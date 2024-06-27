<!-- app\Http\Controllers\PegawaiController.php -->

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Unit;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Pegawai::with('unit')->get();
        return view('pegawais.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        return view('pegawais.create', [
            'units' => $units,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawais,email',
            'tanggal_lahir' => 'required|date',
            'unit_id' => 'required|exists:units,id',
        ]);

        try {
            Pegawai::create($validatedData);
            return redirect()->route('pegawais.index')->with('success', 'Pegawai created successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withInput()->withErrors(['email' => 'Email already exists.']);
            }
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while creating the Pegawai.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::with('unit')->findOrFail($id);
        return view('pegawais.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $units = Unit::all();
        return view('pegawais.edit', compact('pegawai', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawais,email,' . $pegawai->id,
            'tanggal_lahir' => 'required|date',
            'unit_id' => 'required|exists:units,id',
        ]);

        try {
            $pegawai->update($validatedData);
            return redirect()->route('pegawais.index')->with('success', 'Pegawai updated successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withInput()->withErrors(['email' => 'Email already exists.']);
            }
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while updating the Pegawai.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawais.index')->with('success', 'Pegawai deleted successfully.');
    }
}
