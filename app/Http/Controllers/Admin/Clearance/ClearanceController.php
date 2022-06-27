<?php

namespace App\Http\Controllers\Admin\Clearance;

use App\Http\Controllers\Controller;
use App\Models\Clearance\Clearance;
use Illuminate\Http\Request;

class ClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clearances = Clearance::get();
        return view('admin.clearance.index', compact('clearances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clearance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:clearance,name',
            'active_from' => 'required|date',
            'active_to' => 'required|date|after:active_from'
        ]);

        $clearance = new Clearance();
        $clearance->name = $request->name;
        $clearance->active_from = $request->date('active_from');
        $clearance->active_to = $request->date('active_to');
        $clearance->save();

        return redirect()->route('admin.clearance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clearance $clearance)
    {
        return view('admin.clearance.show', compact('clearance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clearance $clearance)
    {
        return view('admin.clearance.edit', compact('clearance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clearance $clearance)
    {
        $request->validate([
            'name' => 'required|unique:clearance,name,'.$clearance->id,
            'active_from' => 'required|date',
            'active_to' => 'required|date|after:active_from'
        ]);

        $clearance->name = $request->name;
        $clearance->active_from = $request->date('active_from');
        $clearance->active_to = $request->date('active_to');
        $clearance->save();

        return redirect()->route('admin.clearance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
