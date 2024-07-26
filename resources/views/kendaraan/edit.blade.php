@extends('layouts.app')

@section('title', 'Edit Kendaraan')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Kendaraan</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('kendaraan.update', $kendaraans) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="merk_kendaraan">Merk Kendaraan</label>
                                        <input type="text" class="form-control" id="merk_kendaraan" name="merk_kendaraan" value="{{ old('merk_kendaraan', $kendaraans->merk_kendaraan) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="model_kendaraan">Model Kendaraan</label>
                                        <input type="text" class="form-control" id="model_kendaraan" name="model_kendaraan" value="{{ old('model_kendaraan', $kendaraans->model_kendaraan) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipe_kendaraan">Tipe Kendaraan</label>
                                        <input type="text" class="form-control" id="tipe_kendaraan" name="tipe_kendaraan" value="{{ old('tipe_kendaraan', $kendaraans->tipe_kendaraan) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="warna_kendaraan">Warna Kendaraan</label>
                                        <input type="text" class="form-control" id="warna_kendaraan" name="warna_kendaraan" value="{{ old('warna_kendaraan', $kendaraans->warna_kendaraan) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_kendaraan">Harga Kendaraan</label>
                                        <input type="number" class="form-control" id="harga_kendaraan" name="harga_kendaraan" value="{{ old('harga_kendaraan', $kendaraans->harga_kendaraan) }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
