<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Question::all()->load('auther','answers');
    }

    public function patientQuestion($id){
        return Question::where('patient_id',$id)->load('auther', 'answers');
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
            'patient_id' => 'required|exists:patients,id',
            'content' => 'required|string'
        ]);

        Question::create($request->all());
        return response('Question created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        
        return $question;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        if(auth()->user()->id == $question->patient_id ){
            $request->validate([
                'content' => 'required|string',
            ]);
            
            $question->update($request->all());
            return response('Question updated successfull');
        }else{
            response('you cannot do this operation', 405);
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if(auth()->user()->id == $question->patient_id ){
            $question->destroy($question->id);
            return response('the question deleted successfully');
        }else{
            response('you cannot do this operation', 405);
        }  
    }
}
