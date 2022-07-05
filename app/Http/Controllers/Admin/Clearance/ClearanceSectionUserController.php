<?php

namespace App\Http\Controllers\Admin\Clearance;

use App\Http\Controllers\Controller;
use App\Models\Clearance\Clearance;
use App\Models\Clearance\Section;
use App\Models\Clearance\SectionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClearanceSectionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clearance $clearance, Section $clearance_section)
    {
        $clearance_users = $clearance->users;
        return view('admin.clearance-section-user.index', compact('clearance', 'clearance_section', 'clearance_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Clearance $clearance, Section $clearance_section)
    {
        $clearance_section->users()->delete();

        $request->validate([
            'clearance_section_users' => 'required|array'
        ]);

        foreach ($request->clearance_section_users as $clearance_section_user){

            $validator = Validator::make(
                ['clearance_section_user' => $clearance_section_user],
                ['clearance_section_user' => 'required|exists:user_clearance,id']
            );

            if($validator->passes()){
                $user = new SectionUser();
                $user->user_clearance_id = $clearance_section_user;
                $user->clearance_section_id = $clearance_section->id;
                $user->save();
            }

        }

        return redirect()->route('admin.clearance.clearance-section.user.index', [$clearance->id, $clearance_section->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
