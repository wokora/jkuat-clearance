<?php

namespace App\Http\Controllers\Admin\Clearance;

use App\Http\Controllers\Controller;
use App\Models\Clearance\Clearance;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClearanceUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clearance $clearance)
    {
        $users = User::get();
        return view('admin.clearance-user.index', compact('clearance', 'users'));
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
    public function store(Request $request, Clearance $clearance)
    {
        $clearance->users()->delete();

        $request->validate([
            'clearance_users' => 'required|array'
        ]);

        foreach ($request->clearance_users as $clearance_user){

            $validator = Validator::make(
                ['clearance_user' => $clearance_user],
                ['clearance_user' => 'required|exists:user,id']
            );

            if($validator->passes()){
                $user = new \App\Models\Clearance\User();
                $user->user_id = $clearance_user;
                $user->clearance_id = $clearance->id;
                $user->save();
            }

        }

        return redirect()->route('admin.clearance.user.index', $clearance->id);
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
