<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function create() {
        $karyawans = Karyawan::all();
        return view('addKaryawan', compact('karyawans'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'Nama' => 'required|min:5|max:20',
            'Umur' => 'required|integer|min:20',
            'Alamat' => 'required|min:10|max:40',
            'NomorHp' => 'required|min:9|max:12|regex:/(08)/'
        ]);

        Karyawan::create([
            'Nama' => $request -> Nama,
            'Umur' => $request -> Umur,
            'Alamat' => $request -> Alamat,
            'NomorHp' => $request -> NomorHp
        ]);
        return redirect('/');
    }

    public function index() {
        $karyawans = Karyawan::all();
        return view('welcome', compact('karyawans'));
    }

    public function show($id) {
        $karyawan = Karyawan::findOrFail($id);
        return view('showKaryawan', compact('karyawan'));
    }

    public function edit($id) {
        $karyawan = Karyawan::findOrFail($id);
        return view('editKaryawan', compact('karyawan'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'Nama' => 'required|min:5|max:20',
            'Umur' => 'required|integer|min:20',
            'Alamat' => 'required|min:10|max:40',
            'NomorHp' => 'required|min:9|max:12|regex:/(08)/'
        ]);

        Karyawan::findOrFail($id)->update([
            'Nama' => $request -> Nama,
            'Umur' => $request -> Umur,
            'Alamat' => $request -> Alamat,
            'NomorHp' => $request -> NomorHp
        ]);
        
        return redirect('/show-karyawan'.'/'.$id);
    }

    public function delete($id) {
        Karyawan::destroy($id);
        return redirect('/');
    }
}
