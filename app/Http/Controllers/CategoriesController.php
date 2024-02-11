<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Categories::paginate(5);
        
        
        $search = $request->input('search');

        // Mengecek apakah ada parameter pencarian
        if ($search) {
            // Melakukan pencarian berdasarkan nama kategori
            $category = Categories::where('nama', 'like', '%' . $search . '%')->paginate(5);
        } else {
            // Jika tidak ada parameter pencarian, tampilkan semua data
            
        }

        return view('categories.index', ['category' => $category, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::all();
        return view('categories.create',["categories" =>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'nama' => 'required'
        ]);

        $category = new Categories();
        
        $category->nama = $request['nama'];
       
        

        $category->save();

        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categories::find($id);
        return view('categories.detail',['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriesbyId = Categories::find($id);
        $categories= Categories::all();
        return view('categories.edit',["categoriesbyId" => $categoriesbyId,"categories"=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            
            'nama' => 'required'
        ]);
        $categoriesbyId = Categories::find($id);

        $categoriesbyId->nama= $request['nama'];

        $categoriesbyId->save();
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoriesbyId = Categories::find($id);
        
        

        $categoriesbyId->delete();
        return redirect('/categories');
    }
}
