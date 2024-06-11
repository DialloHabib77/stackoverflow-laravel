<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try{
            $questions = Question::all();
            return response()->json($questions);
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
       return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);
        try {
            $question = new Question();
            $question->user_id = $request->user_id;
            $question->title = $request->title;
            $question->body = $request->body;
            $question->save();
            return response()->json([$question,
                'message' => 'Question created successfully',
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
        return view('questions.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);
        try {
            $question = Question::find($id);
            $question->user_id = $request->user_id;
            $question->title = $request->title;
            $question->body = $request->body;
            $question->save();
            return response()->json([$question,
                'message' => 'Question updated successfully',
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
