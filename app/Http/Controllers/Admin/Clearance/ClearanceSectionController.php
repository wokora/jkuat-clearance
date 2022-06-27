<?php

namespace App\Http\Controllers\Admin\Clearance;

use App\Http\Controllers\Controller;
use App\Models\Clearance\Clearance;
use App\Models\Clearance\Section;
use Illuminate\Http\Request;

class ClearanceSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clearance $clearance)
    {
        return view('admin.clearance-section.index', compact('clearance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Clearance $clearance)
    {
        return view('admin.clearance-section.create', compact('clearance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Clearance $clearance)
    {
        $request->validate([
            'name' => 'required|unique:clearance_section,name',
            'order' => 'required|numeric'
        ]);

        $follows_order = false;

        if($request->has('follow_order')){
            $follows_order = true;
        }

        $section = new Section();
        $section->clearance_id = $clearance->id;
        $section->name = $request->name;
        $section->order = $request->order;
        $section->follows_order = $follows_order;
        $section->save();

        return view('admin.clearance-section.index', compact('clearance'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clearance $clearance, Section $clearance_section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clearance $clearance, Section $clearance_section)
    {
        return view('admin.clearance-section.edit', compact('clearance', 'clearance_section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clearance $clearance, Section $clearance_section)
    {
        $request->validate([
            'name' => 'required|unique:clearance_section,name,'.$clearance_section->id,
            'order' => 'required|numeric'
        ]);

        $follows_order = false;

        if($request->has('follow_order')){
            $follows_order = true;
        }

        $clearance_section->clearance_id = $clearance->id;
        $clearance_section->name = $request->name;
        $clearance_section->order = $request->order;
        $clearance_section->follows_order = $follows_order;
        $clearance_section->save();

        return view('admin.clearance-section.index', compact('clearance'));
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
