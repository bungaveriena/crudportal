<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DivisiController extends Controller
{
    //

    public function index()
    {
        $divisi = Divisi::latest()->paginate(10);
        return view('divisi.index', compact('divisi'));
    }

    public function create(){
        return view('divisi.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);

        $divisi = Divisi::create([
            'name'  => $request->name
        ]);

        if($divisi){
            return redirect()->route('divisi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }
        else{
            
            return redirect()->route('divisi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Divisi $divisi){
        return view('divisi.edit', compact('divisi'));
    }

    public function update(Request $request, Divisi $divisi){
        $this->validate($request, [
            'name'  => 'required'
        ]);

        $divisi = Divisi::findOrFail($divisi->id);
        if($request->file('  ') == ""){
            $divisi->update([
                'name'  => $request->name,
            ]);
        }
        else{
            $divisi->update([
                'name'  => $request->name
            ]);
        }
        if($divisi){
            //redirect dengan pesan sukses
            return redirect()->route('divisi.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('divisi.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id){
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();

        if($divisi){
             //redirect dengan pesan sukses
        return redirect()->route('divisi.index')->with(['success' => 'Data Berhasil Dihapus!']);
        
        }else{
        //redirect dengan pesan error
        return redirect()->route('divisi.index')->with(['error' => 'Data Gagal Dihapus!']);
            }
        }
}
