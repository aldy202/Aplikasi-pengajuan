@extends('layouts.app')

@section('title', 'kendaraan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>kendaraan</h1>
                <div class="section-header-button">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Add kendaraan</button>
                </div>
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
                                <div class="float-right">
                                    <form method="GET" action="{{ route('kendaraan.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="nama">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="justify-content-center">Merk</th>
                                                <th class="justify-content-center">Model</th>
                                                <th class="justify-content-center">Tipe</th>
                                                <th class="justify-content-center">Warna</th>
                                                <th class="justify-content-center">Harga</th>
                                                <th class="justify-content-center">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kendaraans as $kendaraan)
                                                <tr>
                                                    <td>{{ $kendaraan->merk_kendaraan }}</td>
                                                    <td>{{ $kendaraan->model_kendaraan }}</td>
                                                    <td>{{ $kendaraan->tipe_kendaraan }}</td>
                                                    <td>{{ $kendaraan->warna_kendaraan }}</td>
                                                    <td>{{ $kendaraan->harga_kendaraan }}</td>


                                                    <td>
                                                        <div class="d-flex justify-content-left">
                                                            <a href='{{ route('kendaraan.edit', $kendaraan->id) }}' class="btn btn-sm btn-info btn-icon edit-btn">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>
                                                            <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}" method="POST" class="ml-2">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-sm btn-danger btn-icon confirm-delete" data-nama="{{ $kendaraan->merk_kendaraan }}">
                                                                    <i class="fas fa-times"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
@endpush

@section('script')
    <script>
        $(document).ready(function() {
            $('.confirm-delete').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var kendaraan_name = $(this).attr('data-nama');
                swal({
                        title: "Apakah kamu yakin?",
                        text: "kendaraan yang dihapus adalah " + kendaraan_name,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal('kendaraan Anda aman!');
                        }
                    });
            });


        });
    </script>
@endsection

<!-- Modal Create -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('kendaraan.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="merk_kendaraan">merk kendaraan</label>
                        <input type="text" class="form-control" id="merk_kendaraan" name="merk_kendaraan" required>
                    </div>
                    <div class="form-group">
                        <label for="model_kendaraan">model kendaraan</label>
                        <input type="text" class="form-control" id="model_kendaraan"name="model_kendaraan" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe_kendaraan">tipe kendaraan</label>
                        <input type="text" class="form-control" id="tipe_kendaraan" name="tipe_kendaraan" required>
                    </div>
                    <div class="form-group">
                        <label for="warna_kendaraan">warna kendaraan</label>
                        <input type="text" class="form-control" id="warna_kendaraan" name="warna_kendaraan" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_kendaraan">Harga kendaraan</label>
                        <input type="number" class="form-control" id="harga_kendaraan" name="harga_kendaraan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


