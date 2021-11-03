<?php

namespace App\Http\Controllers;
use App\Models\Portal_web;
use App\Models\Divisi;
use Illuminate\Http\Request;

class PortalWebController extends Controller
{
    //

    public function index(Portal_web $portal_web){
        // $portalwebs = Portal_web::latest()->paginate(10);
        // return view('portalweb.index', compact('portalwebs'));
        return view('portalweb.index', [
            'portal_web'    => Portal_web::all()
        ]);
    }

    public function create(){
        return view('portalweb.create', [
            'divisis'   => Divisi::all()
        ]);
    }

    // public function store(Request $request){
    //     // return $request;
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'desc'  => 'required',
    //         'link'  => 'required'
    //     ]);

    //     $portalweb = Portal_web::create([
    //         'name'  => $request->name,
    //         'desc'  => $request->desk,
    //         'link'  => $request->link

    //     ]);

    //     if($portalweb){
    //         return redirect()->route('portalweb.index')->with(['success' => 'Data Berhasil Disimpan!']);
    //     }
    //     else{
            
    //         return redirect()->route('portalweb.index')->with(['error' => 'Data Gagal Disimpan!']);
    //     }
    // }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'divisi_id' => 'required',
            'desc'  => 'required',
            'link'  => 'required'
        ]);

        $portalwebs = Portal_web::create([
            'title'  => $request->title,
            'divisi_id' => $request->divisi_id,
            'desc'  => $request->desc,
            'link'  => $request->link

        ]);

        if($portalwebs){
            return redirect()->route('portalweb.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }
        else{
            
            return redirect()->route('portalweb.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    // public function edit(Portal_web $portal_web){
    //     return view('portalweb.edit', 
    //     [
    //         'portal_web'    => $portal_web,
    //         'divisis'   => Divisi::all()
    //     ]);

    // }

    // public function update(Request $request, Portal_web $portal_web){
    //     $this->validate($request, [
    //         'title' => 'required',
    //         'divisi_id' => 'required',
    //         'desc'  => 'required',
    //         'link'  => 'required'
    //     ]);

    //     $portal_web = Portal_web::findOrFail($portal_web->id);
    //     if($request->file('  ') == ""){
    //         $portal_web->update([
    //             'title'  => $request->title,
    //             'divisi_id' => $request->divisi_id,
    //             'desc'  => $request->desc,
    //             'link'  => $request->link
    //         ]);
    //     }
    //     else{
    //         $$portal_web->update([
    //             'title'  => $request->title,
    //             'divisi_id' => $request->divisi_id,
    //             'desc'  => $request->desc,
    //             'link'  => $request->link
    //         ]);
    //     }
    //     if($portal_web){
    //         //redirect dengan pesan sukses
    //         return redirect()->route('portalweb.index')->with(['success' => 'Data Berhasil Diupdate!']);
    //     }else{
    //         //redirect dengan pesan error
    //         return redirect()->route('portalweb.index')->with(['error' => 'Data Gagal Diupdate!']);
    //     }
    // }

    public function edit($id){
        $portal_web = Portal_web::findOrFail($id);
        return view('portalweb.edit', [
        'portal_web'    => $portal_web,
        'divisis'   => Divisi::all()]);
    }

    public function update(Request $request, $id){

        $this->validate($request, [
             'title' => 'required',
             'divisi_id' => 'required',
             'desc'  => 'required',
             'link'  => 'required'
            ]);
        
        $portal_web=Portal_web::find($id);
        $portal_web->title  = $request->title;
        $portal_web->divisi_id = $request->divisi_id;
        $portal_web->desc  = $request->desc;
        $portal_web->link  = $request->link;
        $portal_web->save();
        return redirect()->route('portalweb.index')->with(['success' => 'Data Berhasil Diupdate!']);



            
        //     if($request->file('  ') == ""){
        //         $portal_web->update([
        //             'title'  => $request->title,
        //             'divisi_id' => $request->divisi_id,
        //             'desc'  => $request->desc,
        //             'link'  => $request->link
        //         ]);
        //     }
        //     else{
        //         $portal_web->update([
        //             'title'  => $request->title,
        //             'divisi_id' => $request->divisi_id,
        //             'desc'  => $request->desc,
        //             'link'  => $request->link
        //         ]);
        //     }
        //     Portal_web::where( 'id', $portal_web->id)
        //         ->update($portal_web);

        //     if($portal_web){
        //         //redirect dengan pesan sukses
        //         return redirect()->route('portalweb.index')->with(['success' => 'Data Berhasil Diupdate!']);
        //     }else{
        //         //redirect dengan pesan error
        //         return redirect()->route('portalweb.index')->with(['error' => 'Data Gagal Diupdate!']);
        //     }
         }


    public function destroy($id)
    {
        $portalweb = Portal_web::findOrFail($id);
        $portalweb->delete();

        if($portalweb){
            //redirect dengan pesan sukses
            return redirect()->route('portalweb.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('portalweb.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

}
