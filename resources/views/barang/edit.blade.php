@extends('layouts.main')
@section('apotekku')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $label }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">{{ ucwords($menu) }}</li>
                                <li class="breadcrumb-item">{{ ucwords($submenu) }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form class="needs-validation" action="{{ route('barang.update', $editbarang->id) }}" method="POST" novalidate>
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-3 mb-4">
                                        <div class="mb-3">
                                            <label>Nama <code>*</code></label>
                                            <input type="text" class="form-control"
                                                oninput="this.value = this.value.toUpperCase()" id="nama"
                                                maxlength="64" name="nama" placeholder="Nama"
                                                value="{{ old('nama_barang', $editbarang->nama_barang) }}"
                                                autocomplete="off" required>
                                            <div class="invalid-feedback">
                                                Data wajib diisi.
                                            </div>
                                            {!! $errors->first('nama', '<div class="invalid-validasi">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <div class="mb-3">
                                            <label>Kode <code>*</code></label>
                                            <input type="text" class="form-control" id="kode" name="kode"
                                                maxlength="5" placeholder="Kode" autocomplete="off"
                                                value="{{ old('kode', $editbarang->kode_barang) }}" required>
                                            <div class="invalid-feedback">
                                                Data wajib diisi.
                                            </div>
                                            {!! $errors->first('kode', '<div class="invalid-validasi">:message</div>') !!}
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Kategori</label>
                                            <input type="text" class="form-control" id="kategori" name="kategori"
                                                placeholder="Kategori" oninput="this.value = this.value.toUpperCase()"
                                                value="{{ old('kategori', $editbarang->kategori_barang) }}" maxlength="15"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Satuan </label>
                                            <input type="text" class="form-control" id="satuan" name="satuan"
                                                maxlength="15" oninput="this.value = this.value.toUpperCase()"
                                                value="{{ old('satuan', $editbarang->satuan) }}" placeholder="Satuan"
                                                autocomplete="off">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-4">
                                        <div class="mb-3">
                                            <label>Harga <code>*</code></label>
                                            <input type="number" class="form-control"
                                                oninput="this.value = this.value.toUpperCase()" id="harga"
                                                maxlength="20" name="harga" placeholder="Harga" autocomplete="off"
                                                value="{{ old('harga', $editbarang->harga) }}" required>
                                            <div class="invalid-feedback">
                                                Data wajib diisi.
                                            </div>
                                            {!! $errors->first('harga', '<div class="invalid-validasi">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <div class="mb-3">
                                            <label>Stok <code>*</code></label>
                                            <input type="number" class="form-control" id="stok" name="stok"
                                                maxlength="10" placeholder="Stok" autocomplete="off"
                                                value="{{ old('stok', $editbarang->stok) }}" required>
                                            <div class="invalid-feedback">
                                                Data wajib diisi.
                                            </div>
                                            {!! $errors->first('stok', '<div class="invalid-validasi">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <div class="mb-3">
                                            <label>Rak <code>*</code></label>
                                            <input type="tect" class="form-control" id="rak" name="rak"
                                                maxlength="20" placeholder="Rak" autocomplete="off"
                                                value="{{ old('rak', $editbarang->lokasi_rak) }}" required>
                                            <div class="invalid-feedback">
                                                Data wajib diisi.
                                            </div>
                                            {!! $errors->first('rak', '<div class="invalid-validasi">:message</div>') !!}
                                        </div>
                                    </div>


                                    <div class="row mt-4">
                                        <div class="col-sm-12">
                                            <a href="{{ route('barang.index') }}"
                                                class="btn btn-secondary waves-effect">Batal</a>
                                            <button class="btn btn-primary" type="submit"
                                                style="float: right">Simpan</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
