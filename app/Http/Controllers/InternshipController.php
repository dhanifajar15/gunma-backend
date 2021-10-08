<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $internship =  Internship::orderBy('id','DESC')->get();

        $response = [
            'message'=>'List data magang order by id',
            'data' => $internship
        ];

        return response()->json($response,Response::HTTP_OK);
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'programName' =>['required'],
            'isOpen' =>['required'],
            'description' =>['required'],
            'duration' =>['required','numeric'],
            'benefit' =>['required'],
            'requirement' =>['required'],
            'registrationLink' =>['required'],
            'closeRegistration' =>['required'],
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),Response::HTTP_UNPROCESSABLE_ENTITY);

        }

        try {
            $internship = Internship::create($request->all());
            $response =[
                'message' => 'Internship created',
                'data' => $internship
            ];

            return response()->json($response,Response::HTTP_CREATED);

        } catch (QueryException $e) {
            return response()->json([
                'message' => $e->errorInfo
            ]);
        }

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
        $internship = Internship::findOrFail($id);

        $response = [
            'message'=>'List data magang order by id',
            'data' => $internship
        ];

        return response()->json($response,Response::HTTP_OK);
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
        $internship = Internship::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'programName' =>['required'],
            'isOpen' =>['required'],
            'description' =>['required'],
            'duration' =>['required','numeric'],
            'benefit' =>['required'],
            'requirement' =>['required'],
            'registrationLink' =>['required'],
            'closeRegistration' =>['required'],
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),Response::HTTP_UNPROCESSABLE_ENTITY);

        }

        try {
            $internship ->update($request->all());
            
            $response =[
                'message' => 'Internship updated',
                'data' => $internship
            ];

            return response()->json($response,Response::HTTP_OK);

        } catch (QueryException $e) {
            return response()->json([
                'message' => $e->errorInfo
            ]);
        }
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
        $internship = Internship::findOrFail($id);
        
        try {
            $internship ->delete();
            $response =[
                'message' => 'Internship deleted',
                
            ];

            return response()->json($response,Response::HTTP_OK);

        } catch (QueryException $e) {
            return response()->json([
                'message' => $e->errorInfo
            ]);
        }

    }
}
