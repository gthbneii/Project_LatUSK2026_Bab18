<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    public function index()
    {
        $data_mahasiswa = Mahasiswa::all();
        return view('viewmahasiswa', compact('data_mahasiswa'));
    }

    public function create()
    {
        return view('createmahasiswa');
    }

    public function store(Request $request)
    {
        $rules = [
            'npm' => 'required|numeric|digits:8|unique:mahasiswas,npm',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string',
            'tahunmasuk' => 'required|digits:4|integer',
        ];

        $messages = [
            'npm.required' => 'NPM wajib diisi',
            'npm.numeric' => 'NPM harus berupa angka',
            'npm.unique' => 'NPM sudah terdaftar di sistem',
            'nama.required' => 'Nama Mahasiswa wajib diisi',
            'prodi.required' => 'Program Studi wajib diisi',
            'tahunmasuk.required' => 'Tahun Masuk wajib diisi',
            'tahunmasuk.digits' => 'Tahun Masuk harus terdiri dari 4 digit angka',
            'tahunmasuk.min' => 'Tahun Masuk minimal tahun 2000',
        ];

        $request->validate($rules, $messages);

        // Simpan Data
        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil di Input!');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('editmahasiswa', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $rules = [
            'npm' => 'required|numeric|unique:mahasiswas,npm,' . $id,
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string',
            'tahunmasuk' => 'required|digits:4|integer|min:2000|max:' . date('Y'),
        ];

        $messages = [
            'npm.required' => 'NPM wajib diisi.',
            'npm.numeric' => 'NPM harus berupa angka.',
            'npm.unique' => 'NPM sudah digunakan oleh mahasiswa lain.',
            'nama.required' => 'Nama mahasiswa wajib diisi.',
            'prodi.required' => 'Program Studi wajib diisi.',
            'tahunmasuk.required' => 'Tahun Masuk wajib diisi.',
            'tahunmasuk.digits' => 'Tahun Masuk harus 4 digit angka.',
            'tahunmasuk.min' => 'Tahun Masuk minimal tahun 2000.',
            'tahunmasuk.max' => 'Tahun Masuk tidak boleh melebihi tahun saat ini.',
        ];

        $request->validate($rules, $messages);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diupdate !');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus !');
    }
}
