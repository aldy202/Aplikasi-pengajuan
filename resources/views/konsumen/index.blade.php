@extends('layouts.app')

@section('title', 'Konsumen')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Konsumen</h1>
                <div class="section-header-button">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Add Konsumen</button>
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
                                    <form method="GET" action="{{ route('konsumen.index') }}">
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
                                                <th class="justify-content-center">Nama</th>
                                                <th class="justify-content-center">NIK</th>
                                                <th class="justify-content-center">Tanggal Lahir</th>
                                                <th class="justify-content-center">Status Perkawinan</th>
                                                <th class="justify-content-center">Data Pasangan</th>
                                                <th class="justify-content-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($konsumens as $konsumen)
                                                <tr>
                                                    <td>{{ $konsumen->nama }}</td>
                                                    <td>{{ $konsumen->nik }}</td>
                                                    <td>{{ $konsumen->tanggal_lahir }}</td>
                                                    <td>{{ $konsumen->status_perkawinan }}</td>
                                                    <td>{{ $konsumen->data_pasangan }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-left">
                                                            <a href='{{ route('konsumen.edit', $konsumen->id) }}' class="btn btn-sm btn-info btn-icon edit-btn">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>
                                                            <form action="{{ route('konsumen.destroy', $konsumen->id) }}" method="POST" class="ml-2">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-sm btn-danger btn-icon confirm-delete" data-nama="{{ $konsumen->nama }}">
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
                var konsumen_name = $(this).attr('data-nama');
                swal({
                        title: "Apakah kamu yakin?",
                        text: "Konsumen yang dihapus adalah " + konsumen_name,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal('Konsumen Anda aman!');
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
            <form action="{{ route('konsumen.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Konsumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan" required>
                    </div>
                    <div class="form-group">
                        <label for="data_pasangan">Data Pasangan</label>
                        <input type="text" class="form-control" id="data_pasangan" name="data_pasangan">
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


