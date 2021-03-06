<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Location;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class InternshipController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(Internship::class,'internship');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if( !Auth::check()) {
        //     return response()->json([
        //         "error" => "User No Found"
        //     ]);
        // }

        $internships = Internship::orderBy('id', 'DESC')
            ->with(['user', 'location', 'tag'])
            ->get();
        return response()->json($internships, Response::HTTP_OK);
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
    public function store(Request $request, $userId)
    {

        // $this->authorize('create', Internship::class);

        $user = User::findOrFail($userId);



        $validator = Validator::make($request->all(), [
            'programName' => ['required'],
            'isOpen' => ['required'],
            'description' => ['required'],
            'duration' => ['required', 'numeric'],
            'benefit' => ['required'],
            'requirement' => ['required'],
            'registrationLink' => ['required'],
            'closeRegistration' => ['required'],
            'locationName' => ['required'],
            'tagName' => ['required'],
            'imageUrl' => ['required'],
            'isPaid' => ['required'],
            'isWfh' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {

            $internship = new Internship;
            $internship->programName = $request->programName;
            $internship->isOpen = $request->isOpen;
            $internship->description = $request->description;
            $internship->duration = $request->duration;
            $internship->requirement = $request->requirement;
            $internship->benefit = $request->benefit;
            $internship->registrationLink = $request->registrationLink;
            $internship->closeRegistration = $request->closeRegistration;
            $internship->user_id = $user->id;
            $internship->imageUrl = $request->imageUrl;
            $internship->isWfh = $request->isWfh;
            $internship->isPaid = $request->isPaid;

            $location = Location::firstOrCreate([
                'locationName' => $request->locationName
            ]);
            $internship->location_id = $location->id;


            $tag = Tag::firstOrCreate([
                'tagName' => $request->tagName
            ]);
            $internship->tag_id = $tag->id;


            $internship->save();
            $internship->with(['user', 'location', 'tag']);

            $response = [
                'message' => 'Internship created',
                'data' => $internship
            ];

            return response()->json($response, Response::HTTP_CREATED);
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
    public function show($internship_id)
    {
        //


        // $this->authorize('view', Internship::class);

        $intern = Internship::findOrFail($internship_id);



        $intern->with(['user', 'location', 'tag'])->get();




        return response()->json($intern, Response::HTTP_OK);
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
    public function update(Request $request, $internship_id)
    {

        $internship = Internship::findOrFail($internship_id);
        $internship->update($request->all());


        $location = Location::firstOrCreate([
            'locationName' => $request->locationName
        ]);
        $internship->location_id = $location->id;


        $tag = Tag::firstOrCreate([
            'tagName' => $request->tagName
        ]);
        $internship->tag_id = $tag->id;


        $internship->save();

        $response = [
            'message' => 'Internship edited',
            'data' => $internship
        ];

        return response()->json($response, Response::HTTP_OK);
        // } catch (QueryException $e) {
        //     return response()->json([
        //         'message' => $e->errorInfo
        //     ]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($internship_id)
    {
        //
        $internship = Internship::findOrFail($internship_id);

        try {
            $internship->delete();
            $response = [
                'message' => 'Internship deleted',

            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => $e->errorInfo
            ]);
        }
    }
}
