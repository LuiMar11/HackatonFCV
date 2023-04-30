<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicamentos = Medicamento::all();
        return view('medicamentos.index', compact('medicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $medicamento = new Medicamento();
        $medicamento->nombre = $request->nombre;
        $time = Carbon::parse($request->hora);
        $time->format('g:i a');
        $medicamento->hora = $time;
        if ($request->dias == null) {
            Alert::warning('Debe seleccionar los dias de toma del medicamento');
            return redirect(route('medicamentos.index'));
        } else {
            foreach ($request->dias as $dia) {
                $medicamento->dias .= $dia . ' ';
            }
        }

        $medicamento->save();
        Alert::success('Medicamento creado');
        return redirect(route('medicamentos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicamento = Medicamento::findorFail($id);
        return view('medicamentos.edit', compact('medicamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except('_token', '_method');
        Medicamento::where('id', '=', $id)->update($datos);
        $medicamento = Medicamento::findOrFail($id);
        Alert::success('Medicamento editado');
        return redirect(route('medicamentos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Medicamento::destroy($id);
        Alert::success('Medicamento eliminado');
        return redirect(route('medicamentos.index'));
    }
}
