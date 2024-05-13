<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\BarangModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    protected $title = 'Barang';
    protected $menu = 'Data Barang';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->title,
            'label' => 'List Barang',
            'barangku' => BarangModel::all(),
        ];
        return view('barang.index')->with($data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->title,
            'label' => 'Input Barang',
        ];
        return view('barang.input')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'rak' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $tambahbarang = new BarangModel();
            $tambahbarang->nama_barang = $request->nama;
            $tambahbarang->kode_barang = $request->kode;
            $tambahbarang->kategori_barang = $request->kategori;
            $tambahbarang->satuan = $request->satuan;
            $tambahbarang->harga = $request->harga;
            $tambahbarang->stok = $request->stok;
            $tambahbarang->lokasi_rak = $request->rak;
            $tambahbarang->save();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/barang');
        } catch (\Throwable $err) {
            DB::rollback();
            throw $err;
            AlertHelper::addAlert(false);
            return back();
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
    public function edit($id)
    {
         $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->title,
            'label' => 'Edit Barang',
            'editbarang' => BarangModel::findOrfail($id)
        ];
        return view('barang.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
         $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'rak' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $editbarang = BarangModel::findOrFail($id);
            $editbarang->nama_barang = $request->nama;
            $editbarang->kode_barang = $request->kode;
            $editbarang->kategori_barang = $request->kategori;
            $editbarang->satuan = $request->satuan;
            $editbarang->harga = $request->harga;
            $editbarang->stok = $request->stok;
            $editbarang->lokasi_rak = $request->rak;
            $editbarang->save();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/barang');
        } catch (\Throwable $err) {
            DB::rollback();
            throw $err;
            AlertHelper::addAlert(false);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        DB::beginTransaction();
        try {
            $hapus = BarangModel::findOrFail($id);
            $hapus->deleted_at = Carbon::now();
            $hapus->save();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/barang');
        } catch (\Throwable $err) {
            DB::rollback();
            throw $err;
            AlertHelper::addAlert(false);
            return back();
        }
    }
}
