<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWardRequest;
use App\Http\Requests\UpdateWardRequest;
use App\Models\Ward;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use function Termwind\render;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wards = Ward::all();
        return Inertia::render('Wards/Index',['wards'=>$wards]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Wards/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWardRequest $request)
    {
        $existingWard = Ward::where('name', $request->name)->first();
        if($existingWard){
            return Redirect::back()->with("error","Try again");
        }
        $ward = Ward::create($request->validated());
        return Redirect::route('wards.index')->with("success","Ward Regitered Sucessfully");  
    }

    /**
     * Display the specified resource.
     */
    public function show(Ward $ward)
    {
        return Inertia::render('Wards/Show',['ward'=>$ward]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ward $ward)
    {
        
        return Inertia::render('Wards/Edit',['ward'=>$ward]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWardRequest $request, Ward $ward)
    {
        $wardUpdated = Ward::findOrFail($ward->id);
        $wardUpdated->update($request->validated());

        return Redirect::route('wards.index')->with("success","Ward Updated Sucessfully");  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ward $ward)
    {
        $ward->delete();
        return Redirect::route('wards.index')->with('Ward Deleted Successfully');
    }
}
