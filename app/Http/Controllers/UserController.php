<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $title = 'User';
    protected $menu = 'Data Users';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->title,
            'label' => 'List Users',
            'userku' => User::all(),
        ];
        return view('users.index')->with($data);
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
            'label' => 'Input Users',
        ];
        return view('users.input')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'roles' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $tambahbarang = new User();
            $tambahbarang->name = $request->nama;
            $tambahbarang->email = $request->email;
            $tambahbarang->roles = $request->roles;
            $tambahbarang->save();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/user');
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
    public function edit(string $id)
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->title,
            'label' => 'Edit Barang',
            'edituser' => User::findOrfail($id)
        ];
        return view('users.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'roles' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $editbarang = User::findOrFail($id);
            $editbarang->name = $request->nama;
            $editbarang->email = $request->email;
            $editbarang->roles = $request->roles;
            $editbarang->save();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/user');
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
            $hapus = User::findOrFail($id);
            $hapus->deleted_at = Carbon::now();
            $hapus->save();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/user');
        } catch (\Throwable $err) {
            DB::rollback();
            throw $err;
            AlertHelper::addAlert(false);
            return back();
        }
    }
}
