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
            <form class="needs-validation" action="{{ route('user.update', $edituser->id) }}" method="POST" novalidate>
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
                                                maxlength="25" name="nama" placeholder="Nama" autocomplete="off"
                                                value="{{ old('Nama', $edituser->name) }}" required>
                                            <div class="invalid-feedback">
                                                Data wajib diisi.
                                            </div>
                                            {!! $errors->first('nama', '<div class="invalid-validasi">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <div class="mb-3">
                                            <label>Email <code>*</code></label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                maxlength="45" placeholder="Email" autocomplete="off"
                                                value="{{ old('email', $edituser->email) }}" required>
                                            <div class="invalid-feedback">
                                                Data wajib diisi.
                                            </div>
                                            {!! $errors->first('email', '<div class="invalid-validasi">:message</div>') !!}
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Roles</label>
                                            <input type="text" class="form-control" id="roles" name="roles"
                                                value="Administrator" placeholder="roles"
                                                value="{{ old('roles', $edituser->roles) }}"
                                                oninput="this.value = this.value.toUpperCase()" maxlength="15"
                                                autocomplete="off" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="row mt-4">
                                        <div class="col-sm-12">
                                            <a href="{{ route('user.index') }}"
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
