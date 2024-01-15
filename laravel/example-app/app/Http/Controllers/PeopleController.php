<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PeopleController extends Controller
{
    public function index()
    {
        // READ all records
        $people = People::all();
        return response()->json($people, 200);
    }

    public function show($id)
    {
        // READ a specific record
        $person = People::findOrFail($id);
        return response()->json($person, 200);
    }

    public function store(Request $request)
    {
        // CREATE a new record
        $validatedData = $request->validate([
            'name' => 'required|string',
            'lastName' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $person = People::create($validatedData);

        return response()->json($person, 201);
    }

    public function update(Request $request, $id)
{
    // UPDATE a record
    $person = People::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'string',
        'lastName' => 'string',
        'phone' => 'string',
        'address' => 'string',
    ]);

    $person->fill($validatedData);
    $person->save();

    return response()->json($person, 200);
}

    public function destroy($id)
    {
        // DELETE a record
        $person = People::findOrFail($id);
        $person->delete();

        return response()->json(null, 204);
    }
}
