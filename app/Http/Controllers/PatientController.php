<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Patient::all()->load('user');
    }

    public function search()
    {

        return User::where('role','=','1')
                                ->where('fullname','like', '%'.request('name').'%')
                                ->where('email','like', '%'.request('email').'%')
                                ->get();
    }

    // search the patient by name


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'string|required|max:255',
            'age' => 'integer|required',
            'cne' => 'string|required',
            'phone' => 'required|integer',
            'dateOfBirth' => 'date|required',
            'avatar' => 'string|required',
            'user_id' => 'required|exists:users,id',
            'allergies' => 'string',
            'sickness' => 'string'
        ]);

        if( auth()->user()->id == $request->user_id ){

           $patient =  Patient::create($request->all());
             return response([
                 'message' => 'Patient Created successfully',
                 'patient' => $patient
            
            ]);
             
        }

        return response(['message' => 'you are not authorized to do this operation'],405);
    }

    
    public function show(Patient $patient)
    {
        return $patient->load('user');
    }

   
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        if(Patient::find($id)){
            if( $user->patient->id == $id ){
                $request->validate([
                    'fullname',
                    'phone',
                    'address',
                    'allergies' => 'string',
                    'sickness' => 'string'
                ]);
                $patient = Patient::find($id);

                $patient->update($request->all());
                return response('the Patient information updated successfully');
            }
            return response(['message' => 'you are not authorized to do this operation'],405);
        }
        return response("this Patient does't exist", 404);
    }
}
