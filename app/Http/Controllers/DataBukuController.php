<?php

namespace App\Http\Controllers;

use App\Models\DataBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;


class DataBukuController extends Controller
{
    public function index()
    {
        $dataBuku = DataBuku::orderBy('id', 'DESC')->get();
        return view('admin.databuku.index', compact('dataBuku'));
    }

    public function create()
    {
        return view ('admin.databuku.tambah');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'judul'         => 'required',
            'jb'            => 'nullable',
            'pengarang'     => 'nullable',
            'penerbit'     => 'nullable',
            'th_terbit'     => 'nullable',
            'deskripsi'     => 'nullable',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasFile('gambar')){
            $image              = $request->file('gambar');
            $imageName          = time().'.'.$image->getClientOriginalExtension();
            $destinationPath    = public_path('/assets/img');
            $image->move($destinationPath, $imageName);
        };

        $dataBuku = DataBuku::create([
            'judul'             => $request->judul,
            'jb'                => $request->jb,
            'pengarang'         => $request->pengarang,
            'penerbit'         => $request->penerbit,
            'th_terbit'         => $request->th_terbit,
            'deskripsi'         => $request->deskripsi,
            'gambar'            => $imageName
        ]);
        $dataBuku->save();
        // dd($dataBuku);

        return redirect('/admin/databuku');
    }

    public function edit(DataBuku $dataBuku, $id)
    {
        //
        $dataBuku = DataBuku::find($id);

        return view('admin.databuku.edit', compact('dataBuku'));
    }

    public function update(Request $request, DataBuku $dataBuku, $id)
    {
        //
        $request->validate([
            'judul'         => 'required',
            'jb'            => 'nullable',
            'pengarang'     => 'nullable',
            'penerbit'     => 'nullable',
            'th_terbit'     => 'nullable',
            'deskripsi'     => 'nullable',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasFile('gambar')){
            $image              = $request->file('gambar');
            $imageName          = time().'.'.$image->getClientOriginalExtension();
            $destinationPath    = public_path('/assets/img');
            $image->move($destinationPath, $imageName);
        };
        $dataBuku = DataBuku::find($id);
        $dataBuku->update([
            'judul'             => $request->judul,
            'jb'                => $request->jb,
            'pengarang'         => $request->pengarang,
            'penerbit'         => $request->penerbit,
            'th_terbit'         => $request->th_terbit,
            'deskripsi'         => $request->deskripsi,
            'gambar'            => $imageName
        ]);
        // dd($dataBuku);

        return redirect('/admin/databuku');
    }

    public function destroy(DataBuku $dataBuku, $id)
    {
        //
        $dataBuku = DataBuku::find($id);
        $dataBuku->delete();

        return redirect('/admin/databuku');
    }
}
