<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Http\Requests\CreateGalleriesRequest;
use App\Http\Requests\UpdateGalleriesRequest;

class GalleriesController extends Controller
{
    public function index(Request $request) {
        // $galleries = Gallery::all();
        $name = $request->query('name');
        $description = $request->query('description');

        $pagination = $request->query('per_page', 10);
        $query = Gallery::query();
        $galleries = $query->paginate($pagination);

        if($name) {
            $query->searchByName($name);
        }
        if($description) {
            $query->searchByDescription($description);
        }

        return response()->json($galleries);
    }

    public function show(Gallery $gallery) {
        return response()->json($gallery);
    }

    public function store(CreateGalleriesRequest $request) {
        $data = $request->validated();
        $gallery = Gallery::create($data);
        return response()->json($gallery);
    }

    public function update(UpdateGalleriesRequest $request, Gallery $gallery) {
        $gallery->update($request->validated());
        return response()->json($gallery);
    }

    public function destroy(Gallery $gallery) {
        $gallery->delete();
        return response(null, 204);
    }
}
