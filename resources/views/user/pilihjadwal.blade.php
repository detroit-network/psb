@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="mt-2 col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header bg-primary">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-alt "></i>
                        Form Pilih Jadwal Tes
                    </h3>
                    <div class="card-tools">
                        <a href="/psb" type="button" class="btn bg-danger btn-sm">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-danger">
                        Silahkan pilih jadwal sesuai dengan waktu yang tersedia
                    </div>
                <form role="form" method="POST" action="{{ route('doku.updatejadwal') }}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-5 col-form-label">Tanggal Tes Wawancara</label>
                        <div class="col-sm-7">
                            @if(App\Jadwal::itungJadwal($calon->asal_nf) > 0)
                            <select class="form-control" name="jadwal_id" required>
                                <option selected disabled>Pilih Jadwal</option>
                                @foreach(App\Jadwal::pilihJadwal($calon->asal_nf) as $j)
                                    <option value="{{ $j->id }}">{{ $j->seleksinya }}</option>
                                @endforeach
                            </select>
                            @else
                            <input type="text" class="form-control" value="Belum Tersedia" required readonly>
                            @endif
                            <input name="calon" type="hidden" class="form-control" value="{{ $calon->id }}" required readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit" class="col btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
