<?php

namespace App\Http\Controllers;

use App\DataKaryawan;
use Illuminate\Http\Request;
use App\Jabatan;
use App\Status;
use App\Pendidikan;

class DataKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Pages.Karyawan.index', ['karyawan' => DataKaryawan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        $statuses = Status::all();
        $pendidikans = Pendidikan::all();
        return view('Pages.Karyawan.create', compact('jabatans', 'statuses', 'pendidikans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3',
            'alamat' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'tgl_lahir' => 'required',
            'jabatan_id' => 'required',
            'status_id' => 'required',
            'pendidikan_id' => 'required',
            'tgl_masuk' => 'required'
        ]);

        DataKaryawan::create($validateData);
        return redirect('/Data-Karyawan')->with('pesan', "Karyawan $request->nama berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataKaryawan  $dataKaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(DataKaryawan $dataKaryawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataKaryawan  $dataKaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatans = Jabatan::all();
        $statuses = Status::all();
        $pendidikans = Pendidikan::all();
        $dataKaryawan = DataKaryawan::find($id);
        return view('Pages.Karyawan.edit', compact('jabatans', 'statuses', 'pendidikans', 'dataKaryawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataKaryawan  $dataKaryawan
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, DataKaryawan $dataKaryawan)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3',
            'alamat' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'tgl_lahir' => 'required',
            'jabatan_id' => 'required',
            'status_id' => 'required',
            'pendidikan_id' => 'required',
            'tgl_masuk' => 'required' 
        ]);

        $dataKaryawan->find($id)->update($validateData);
        return redirect('/Data-Karyawan/' . $dataKaryawan->id)->with('pesan', "Karyawan $dataKaryawan->nama_ berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataKaryawan  $dataKaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataKaryawan = DataKaryawan::findOrFail($id);
        $dataKaryawan->delete();
        // Jabatan::where('jabatan_id', $id);
        return redirect('/Data-Karyawan')->with('pesan', "Karyawan $dataKaryawan->nama berhasil dihapus");
    }
}
