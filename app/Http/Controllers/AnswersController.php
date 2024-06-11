<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
          try {
                $answers = Answer::all();
                return response()->json($answers);
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Error: ' .
                    $e->getMessage(),
                    'code' => $e->getCode()
                ]);
            }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
               'question_id' => 'required',
                'user_id' => 'required',
                'body' => 'required',
                'validated' => 'required'
        ]);
        try {
            $answer = new Answer();
            $answer->question_id = $request->question_id;
            $answer->user_id = $request->user_id;
            $answer->body = $request->body;
            $answer->validated = 'false';
            $answer->save();
            return response()->json([$answer,
                'message' => 'Answer created successfully',
                'code' => 200,

            ] );
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' .
                $e->getMessage(),
                'code' => $e->getCode()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'question_id' => 'required',
            'user_id' => 'required',
            'body' => 'required',
            'validated' => 'required'
        ]);
        try {
            $answer = Answer::find($id);
            $answer->question_id = $request->question_id;
            $answer->user_id = $request->user_id;
            $answer->body = $request->body;
            $answer->validated = $request->validated;
            $answer->save();
            return response()->json([$answer,
                'message' => 'Answer updated successfully',
                'code' => 200,

            ] );
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' .
                $e->getMessage(),
                'code' => $e->getCode()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
