@extends('layouts.app')

@section('title', 'Edit Konsumen')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Konsumen</h1>
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
                                <form action="{{ route('konsumen.update', $konsumen) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $konsumen->nama) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $konsumen->nik) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $konsumen->tanggal_lahir) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status_perkawinan">Status Perkawinan</label>
                                        <input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan" value="{{ old('status_perkawinan', $konsumen->status_perkawinan) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="data_pasangan">Data Pasangan</label>
                                        <input type="text" class="form-control" id="data_pasangan" name="data_pasangan" value="{{ old('data_pasangan', $konsumen->data_pasangan) }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ route('konsumen.index') }}" class="btn btn-secondary">Kembali</a>
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
