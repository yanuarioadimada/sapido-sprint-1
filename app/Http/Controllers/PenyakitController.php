<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        return view('dashboard.penyakit.index',compact('penyakit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hewan = Hewan::where('id_profile',Auth::user()->profile->id)->get();
        return view('dashboard.penyakit.form',compact('hewan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $gambar = $request->file('gambar');
            if($gambar){
                $gambar->storeAs('public/penyakit',$gambar->hashName());
                $path = 'storage/penyakit/'.$gambar->hashName();
                $nogambar = $request->except('gambar');
                $withgambar = array_merge($nogambar,['gambar' => $path, 'status' => 'diproses']);
                
            }else{
                $request->merge(['status' => 'diproses']);
                $withgambar = $request->all(); 
            }
            Penyakit::create($withgambar);
            return redirect()->route('penyakit.index')->with('success','Data berhasil ditambahkan');
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->route('penyakit.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penyakit = Penyakit::find($id);
        $hewan = Hewan::where('id_profile',Auth::user()->profile->id)->get();
        return view('dashboard.penyakit.edit',compact('penyakit','hewan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penyakit::find($id)->delete();
        return redirect()->route('penyakit.index')->with('success','Data berhasil dihapus');
    }
}
