<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PulsaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.admin.barang.manage-pulsa');
    }

    public function datatable(Request $request){
        
        $data = Product::where('type', 'pulsa');

        return DataTables::of($data)->make();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['provider'] = Provider::get();
        return view('content.admin.barang.manage-pulsa-edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            
            'provider_id' => $request->provider_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => null,
            'type'  => 'pulsa',

        ]);

        return redirect()->back()->with('success', 'Berhasil membuat data!');

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
        $data['user'] = Product::findOrFail($id);
        return view('content.admin.barang.manage-pulsa-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Product::findOrFail($id)->update([
            
            'provider_id' => $request->provider_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => null,
            'type'  => 'pulsa',

        ]);

        return redirect()->back()->with('success', 'Berhasil mengupdate data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }
}
