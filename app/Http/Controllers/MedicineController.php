<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Models\Medicine;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use function Termwind\render;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::all();
        return Inertia::render('Medicine/Index',['medicines'=>$medicines]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Medicine/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicineRequest $request)
    {
        $existingMedicine = Medicine::where('name', $request->name)->first();
        if ($existingMedicine) {
            return Redirect::back()->with("error", "Try again");
        }
        $Medicine = Medicine::create($request->validated());
        return Redirect::route('medicines.index')->with("success", "Medicine Regitered Sucessfully");  
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
    {
        return Inertia::render('Medicine/Edit',['medicine'=>$medicine]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
        $medicineUpdated = Medicine::findOrFail($medicine->id);
        $medicineUpdated->update($request->validated());

        return Redirect::route('medicines.index')->with("success", "medicine Updated Sucessfully");  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return Redirect::route('medicines.index')->with('medicine Deleted Successfully');
    }
}
