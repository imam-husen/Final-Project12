<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class JawabanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'jawaban' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg|max:2048',
        ],
        [
            'jawaban.required' => 'Jawaban pertanyaan harus diisi',
        ]
    );
    $id = Auth::id();
    $jawaban = new Jawaban;

    if ($request->has('gambar')){
        $namagambar = time().'.'.$request->gambar->extension();  
        
        $request->gambar->move(public_path('images/jawaban'), $namagambar);

        $jawaban->gambar = $namagambar;
        // $jawaban->save();
    }

    $jawaban->jawaban = $request->jawaban;
    $jawaban->users_id = $id;
    $jawaban->pertanyaan_id = $request->pertanyaan_id;

    $jawaban->save();
    // toastr()->success('Jawaban kamu berhasil disimpan.', 'Berhasil!');
    return redirect('/pertanyaan/'.$request->pertanyaan_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $jawaban = Jawaban::find($id);
        return view('jawaban.detail', compact('jawaban'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jawaban = Jawaban::find($id);
        return view('jawaban.update', compact('jawaban'));
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
        //
        $request->validate([
            'jawaban' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg|max:2048',
        ],
        [
            'jawaban.required' => 'Jawaban pertanyaan harus diisi',
        ]
    );
    $id_user = Auth::id();

    $jawaban = Jawaban::find($id);
    if ($request->has('gambar')){
        $path = "images/jawaban/";
        File::delete($path . $jawaban->gambar);
        $namagambar = time().'.'.$request->gambar->extension();  
        
        $request->gambar->move(public_path('images/jawaban'), $namagambar);

        $jawaban->gambar = $namagambar;
        $jawaban->save();
    }

    $jawaban->jawaban = $request->jawaban;
    $jawaban->users_id = $id_user;
    $jawaban->pertanyaan_id = $request->pertanyaan_id;
    $jawaban->save();
    // toastr()->success('Jawaban kamu berhasil diedit.', 'Berhasil!');
    return redirect('/pertanyaan/'.$request->pertanyaan_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jawaban = Jawaban::find($id);
        $pertanyaan_id = $jawaban->pertanyaan_id;

        $path = "images/jawaban/";
        File::delete($path . $jawaban->gambar);
         
        $jawaban->delete();  
        // toastr()->error('Jawaban kamu berhasil dihapus', 'Berhasil!');
        return redirect('/pertanyaan/'.$pertanyaan_id);

    }
}
