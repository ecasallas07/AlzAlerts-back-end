<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Reminder;
use App\Http\Requests\StoreReminderRequest;
use App\Http\Requests\UpdateReminderRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ReminderResource;
use App\Filters\ReminderFilter;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reminder = Reminder::all();
        return response()->json([
            'success' => true,
            'message' => 'Successful operation',
            'data' => new ReminderResource($reminder)
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReminderRequest $request)
    {
        $reminder = Reminder::create($request->all());
        return response()->json([
            'success' => true,
            'created' => new ReminderResource($reminder)
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $filter = new ReminderFilter();
        $queryItems = $filter->transform($request);
        $galery = Reminder::where($queryItems)->get();

        if($galery->isEmpty())
        {
            return response()->json(['error'=> 'NO se encontraron datos'],404);

        }
        return response()->json(['data' => new ReminderResource($galery)],200);

    }

    public function showId($id)
    {
        $reminder = Reminder::find($id);
        return response()->json([
            'success' => true,
            'data' => new ReminderResource($reminder)
        ],200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReminderRequest $request, $id)
    {
        $reminder= Reminder::find($id);
        $reminder->reminder_title = $request->reminder_title;
        $reminder->reminder_subject = $request->reminder_subject;
        $reminder->reminder_date = $request->reminder_date;
        $reminder->reminder_time =$request->reminder_time;
        $reminder->user_id = $request->user_id;
        $reminder->save();

        return response()->json([
            'success' => true,
            'updated' =>  new ReminderResource($reminder)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reminder = Reminder::find($id)->delete();
        return response()->json([
            'eliminated' => $reminder,
            'success' => true
        ],200);
    }
}
