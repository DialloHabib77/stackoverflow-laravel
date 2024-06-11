<?php

namespace App\Http\Controllers;

use App\Models\Validation;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'answer_id' => 'required',
            'supervisor_id' => 'required',
            ]);
        try{
            $validation = new Validation();
            $validation->answer_id = $request->answer_id;
            $validation->supervisor_id = $request->supervisor_id;
            $validation->save();
            return response()->json([$validation,
                'message' => 'Validation created successfully',
                'code' => 200,
            ]);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
