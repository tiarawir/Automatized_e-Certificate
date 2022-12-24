<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request('katakunci'));
        $data = Mahasiswa::all();
        // if(request('katakunci')){
        //     $data->where('nama','LIKE','%'.request('katakunci').'%');
        // }

        return view('mahasiswa.index', compact('data'));
    }
    public function search()
    {
        $filter = request()->query();
        return Mahasiswa::where('nama','LIKE','%'.request('katakunci').'%')->get();        
        // $data = Mahasiswa::latest();
        // if (request('katakunci')) {
        //     $data->where('nama', 'LIKE', '%' . request('katakunci') . '%');
        // }

        // return view('mahasiswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Mahasiswa;
        return view('mahasiswa.create', compact('model'));
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
            'nim' => 'required|unique:mhs,id',
            'nama' => "required|regex:/^([a-zA-Z']+)(\s[a-zA-Z']+)*$/",
            'alamat' => 'required',
            'jk' => 'required',
        ]);

        Mahasiswa::insert([
            'id' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jk' => $request->jk
        ]);
        // $model = new Mahasiswa;
        // $model->id = $request->nim;
        // $model->nama = $request->nama;
        // $model->alamat = $request->alamat;
        // $model->jk = $request->jk;

        // $model->save();
        return redirect('mahasiswa');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $model = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('model'));
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
            'nim' => 'required'
        ]);
        // Mahasiswa::insert([
        //     'id' => $request->nim,
        //     'nama' => $request->nama,
        //     'alamat' => $request->alamat,
        //     'jk' => $request->jk
        // ]);
        $model = Mahasiswa::find($id);
        $model->id = $request->nim;
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->jk = $request->jk;

        $model->save();
        return redirect('mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Mahasiswa::find($id);
        $model->delete();
        return redirect('mahasiswa')->with('success', 'Data Deleted');
    }
}
