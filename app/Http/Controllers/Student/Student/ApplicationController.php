<?php

namespace App\Http\Controllers\Student\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\Application;
use App\Models\Section\Section;
use App\Notifications\Student\ApplicationReceived;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Application $application)
    {
        $section = $application->sections ? $application->sections->first(): null;
        return view('student.apply', ['application' => $application, 'section' => $section]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Application $application)
    {
        return view('student.form.view', ['application' => $application]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $application = \App\Models\Application\Application::find($request->application_id);
        $status = $application->statuses()->where('is_default', true)->first();

        $student_application = new Application();
        $student_application->application_id = $application->id;
        $student_application->student_id = auth()->guard('student')->id();
        $student_application->application_status_id = $status->id;
        $student_application->save();

        return redirect()->route('student.student-application.show', [$student_application->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Application $student_application)
    {
        $student = auth()->guard('student')->user();
        $student_application = $student->student_applications()->findOrFail($student_application->id);
        $section = $student_application->application->form->sections ? $student_application->application->form->sections->first(): null;
        return view('student.application.view', ['student_application' => $student_application, 'section' => $section]);
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
    public function update(Request $request, Application $student_application)
    {

        $student = auth()->guard('student')->user();

        $current_status = $student_application->status;

        $message = 'Application Submitted';

        $all_student_applications = 0;

        if($current_status->is_default){
            $status = $student_application->application->statuses()->where('is_default', false)->first();
            $all_student_applications = $student->student_applications()->where('application_status_id', $status->id)->where('application_id', $student_application->application->id)->count();
            $student->notify( new ApplicationReceived($student_application) );
        }else{
            $status = $student_application->application->statuses()->where('is_default', true)->first();
            $message = 'Application Recalled';
        }

        if($all_student_applications > 0){
            return redirect()->route('student.student-application.show', $student_application->id)->with('error', 'Application not saved, you already have a '.strtolower($status->name).' application.');
        }

        $student_application->application_status_id = $status->id;
        $student_application->save();

        return redirect()->route('student.student-application.show', $student_application->id)->with('success', $message);;
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
