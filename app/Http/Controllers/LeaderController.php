<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('leader.index',[
            'leaders'=>Leader::latest()->paginate(10),
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leader.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'gambar' => 'required|image|mimes:png,jpg|max:2040',
        // ]);

        // $gambar =$request->gambar;
        // $slug = Str::slug($gambar->getClientOriginalName());
        // $new_gambar = time() .'_'. $slug;
        // $gambar->move('upload/leader/', $new_gambar);

        // $leader = new Leader;
        // $leader->name = $request->name;
        // $leader->email = $request->email;
        // $leader->gambar = 'upload/leader/'.$new_gambar;
        // $leader->save();

        // return to_route('leader.index')->with('pesan','Data berhasil ditambahkan');

        $validatedData=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'gambar' => 'required|image',

        ]);

        if ($request->hasFile('gambar')) {
            $namaFile='img_'.time().'_'.$request->gambar->getClientOriginalName();
            $request->gambar->move('img',$namaFile);
        }else {
            $namaFile='';
        }

        $validatedData['gambar']=$namaFile;
        
        Leader::create($validatedData);
        return redirect('/leader')->with('pesan','Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function show(leader $leader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function edit(leader $leader)
    {
        return view('leader.edit',[
            'leaders' => $leader,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, leader $leader)
    {
        $validatedData=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'gambar' => 'required|image',

        ]);

        if ($request->hasFile('gambar')) {
            $namaFile='img_'.time().'_'.$request->gambar->getClientOriginalName();
            $request->gambar->move('img',$namaFile);
        }else {
            $namaFile='';
        }

        $validatedData['gambar']=$namaFile;
        
        Leader::where('id',$leader->id)->update($validatedData);
        return redirect('/leader')->with('pesan','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function destroy(leader $leader)
    {
        Leader::destroy($leader->id);
        return redirect('/leader')->with('pesan','Data berhasil dihapus');
    }
}
