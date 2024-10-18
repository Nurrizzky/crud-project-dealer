<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cars = Car::all();
        return view('dataMobil.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dataMobil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'brand' => 'required|max:100',
            'from' => 'required|max:100',
            'model' => 'required|max:100',
            'years' => 'required',
            'color' => 'required|max:100',
            'transmission' => 'required',
        ], [
            'brand.required' => 'Brand harus diisi',
            'from.required' => 'From harus diisi',
            'model.required' => 'Model harus diisi',
            'years.required' => 'Year harus diisi',
            'color.required' => 'Color harus diisi',
            'transmission.required' => 'Transmission harus diisi',
        ]);

        $proses = Car::create([
            'brand' => $request->brand,
            'from' => $request->from,
            'model' => $request->model,
            'years' => $request->years,
            'color' => $request->color,
            'transmission' => $request->transmission,
        ]);

        if ($proses) {
            return redirect()->route('cars.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('failed', 'Data Gagal Ditambahkan');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $cars = Car::where('id', $id)->first();
        return view('dataMobil.edit', compact('cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'brand' => 'required|max:100',
            'from' => 'required|max:100',
            'model' => 'required|max:100',
            'years' => 'required',
            'color' => 'required|max:100',
            'transmission' => 'required',
        ], [
            'brand.required' => 'Brand harus diisi',
            'from.required' => 'From harus diisi',
            'model.required' => 'Model harus diisi',
            'years.required' => 'Year harus diisi',
            'color.required' => 'Color harus diisi',
            'transmission.required' => 'Transmission harus diisi',
        ]);

        $proses = Car::where('id', $id)->update([
            'brand' => $request->brand,
            'from' => $request->from,
            'model' => $request->model,
            'years' => $request->years,
            'color' => $request->color,
            'transmission' => $request->transmission,
        ]);

        if ($proses) {
            return redirect()->route('cars.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $proses = Car::where('id', $id)->delete();
        if ($proses) {
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        }else {
            return redirect()->back()->with('failed', 'Data Gagal Dihapus');
        }
    }
}
