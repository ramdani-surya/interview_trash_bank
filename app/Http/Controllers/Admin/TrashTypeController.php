<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrashTypeRequest;
use App\Models\TrashType;
use Illuminate\Http\Request;

class TrashTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pageTitle'] = 'Trash Type';
        $data['trashTypes'] = TrashType::all();

        return view('admin.pages.trash_type.index', $data);
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
    public function store(StoreTrashTypeRequest $request)
    {
        $validated = $request->validated();

        if ($image = $request->file('image')) {
            $fileName     = encrypt($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $fileLocation = $image->move('uploads', $fileName);
        }

        $trashTypes = new TrashType;
        $trashTypes->type_name = $validated['type_name'];
        $trashTypes->price_kg = $validated['price'];
        $trashTypes->description = $validated['description'];
        $trashTypes->image = $fileLocation ?? null;
        $trashTypes->save();

        return redirect()->route('trash-type.index')->with('success', 'New Trash Type Created.');
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
