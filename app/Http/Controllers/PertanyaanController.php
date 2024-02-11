<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\Categories;
use Illuminate\Support\Facades\File;
class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');

    }
    public function index()
    {
        $pertanyaan = Pertanyaan::get();
        
        return view('pertanyaan.index',['pertanyaan'=> $pertanyaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::all();
        return view('pertanyaan.create',["category" =>$category]);
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
            'gambar' => 'required|mimes:jpg,jpeg,png|max:2048',
            'judul' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            
        ]);
        $request['users_id'] = auth()->user()->id; // Menambahkan users_id sebelum validasi

        $gambarName = time().'.'.$request->gambar->extension();  
   
        $request->gambar->move(public_path('image'), $gambarName);

        $pertanyaan = new Pertanyaan;
        
        $pertanyaan->judul = $request['judul'];
        $pertanyaan->content = $request['content'];
        $pertanyaan->category_id= $request['category_id'];
        $pertanyaan->users_id= $request['users_id'];
        $pertanyaan->gambar = $gambarName;

        $pertanyaan->save();

        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaanbyId = Pertanyaan::find($id);
        return view('pertanyaan.detail',["pertanyaanbyId" => $pertanyaanbyId]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaanbyId = Pertanyaan::find($id);
        $category = Categories::all();

   
        return view('pertanyaan.edit',["pertanyaanbyId" => $pertanyaanbyId,"category"=>$category]);
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
            'gambar' => '|mimes:jpg,jpeg,png|max:2048',
            'judul' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);
        $pertanyaanbyId = Pertanyaan::find($id);
        
        if($request->has('gambar')){
            $path ="image/";
            File::delete($path .$pertanyaanbyId->gambar);

            $gambarName = time().'.'.$request->gambar->extension();  
   
            $request->gambar->move(public_path('image'), $gambarName);


            $pertanyaanbyId->gambar = $gambarName;

    
        }

        $pertanyaanbyId->judul = $request['judul'];
        $pertanyaanbyId->content = $request['content'];
        $pertanyaanbyId->category_id= $request['category_id'];

        $pertanyaanbyId->save();
        return redirect('/pertanyaan');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaanbyId = Pertanyaan::find($id);
       
        
        $path ="image/";
        File::delete($path .$pertanyaanbyId->gambar);

        
        $pertanyaanbyId->delete();
        return redirect('/pertanyaan');
    }
}
