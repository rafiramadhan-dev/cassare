<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    // Index
    public function index()
    {
        $category = Category::all();

        return response()->json([
            'success' => true,
            'data'    => $category
        ], 200);
    }

    // Store
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ], [
            'name.required' => 'Nama kategori wajib diisi!',
            'name.max'      => 'Nama kategori melebihi batas!',
            'photo.required' => 'Foto kategori wajib diupload!',
            'photo.mimes'    => 'Format foto kategori harus jpg, jpeg, atau png!',
            'photo.max'      => 'Ukuran foto kategori maksimal 5MB!',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $slugName = Str::slug($request->name);
        $photoName = $slugName . '_' . time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images/category'), $photoName);

        $category = Category::create([
            'name'  => $request->name,
            'photo' => $photoName,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil ditambahkan!',
            'data'    => $category
        ], 201);
    }

    // Show
    public function show(string $id_category)
    {
        $category = Category::find($id_category);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan!'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $category
        ], 200);
    }

    // Update
    public function update(Request $request, string $id_category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ], [
            'name.required' => 'Nama kategori wajib diisi!',
            'name.max'      => 'Nama kategori melebihi batas!',
            'photo.required' => 'Foto kategori wajib diupload!',
            'photo.mimes'    => 'Format foto kategori harus jpg, jpeg, atau png!',
            'photo.max'      => 'Ukuran foto kategori maksimal 5MB!',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $category = Category::find($id_category);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan!'
            ], 404);
        }

        if ($request->hasFile('photo')) {
            $oldPhoto = public_path('uploads/category/' . $category->photo);
            if (file_exists($oldPhoto)) {
                unlink($oldPhoto);
            }

            $slugName  = Str::slug($request->name);
            $photoName = $slugName . '_' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/category'), $photoName);
        } else {
            $photoName = $category->photo;
        }

        $category->update([
            'name'  => $request->name,
            'photo' => $photoName,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil diupdate!',
            'data'    => $category
        ], 200);
    }

    // Destroy
    public function destroy(string $id_category)
    {
        $category = Category::find($id_category);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan!'
            ], 404);
        }

        $oldPhoto = public_path('uploads/category/' . $category->photo);
        if (file_exists($oldPhoto)) {
            unlink($oldPhoto);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil dihapus!'
        ], 200);
    }
}
