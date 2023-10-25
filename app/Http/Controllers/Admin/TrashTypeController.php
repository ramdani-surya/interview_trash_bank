<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrashTypeRequest;
use App\Http\Requests\UpdateTrashTypeRequest;
use App\Models\TrashType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
     * Store a newly created resource in storage.
     */
    public function store(StoreTrashTypeRequest $request)
    {
        $validated = $request->validated();

        if ($image = $request->file('image')) {
            $fileName     = encrypt($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $fileLocation = $image->move('uploads', $fileName);
        }

        $trashType = new TrashType;
        $trashType->type_name = $validated['type_name'];
        $trashType->price_kg = $validated['price'];
        $trashType->description = $validated['description'];
        $trashType->image = $fileLocation ?? null;
        $trashType->save();

        return redirect()->route('trash-type.index')->with('success', 'New Trash Type Created.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrashTypeRequest $request, TrashType $trashType)
    {
        $validated = $request->validated();

        if ($image = $request->file('image')) {
            $fileName     = encrypt($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $fileLocation = $image->move('uploads', $fileName);

            // delete old image
            File::delete($trashType->image);
        }

        $trashType->type_name = $validated['type_name'];
        $trashType->price_kg = $validated['price'];
        $trashType->description = $validated['description'];
        $trashType->image = $fileLocation ?? $trashType->image;
        $trashType->save();

        return redirect()->route('trash-type.index')->with('success', 'Trash Type Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
