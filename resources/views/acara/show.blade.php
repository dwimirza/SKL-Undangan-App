@extends('layouts.app')
@section('content')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">


<div class="container bg-white p-4">
    <div class="row">
        <div class="col-md-6">
            <img src="{{asset('/images/'.$acara->gambar)}}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h4>{{ $acara->nama_acara }}</h4>
            <div class="form-group mb-3">
                <label for="">Jenis Acara</label>
                <input type="text" name="jenis_acara" value="{{$acara->jenis_acara}}" readonly class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Tanggal Acara</label>
                <input type="text" name="tanggal_acara" value="{{$acara->tanggal_acara}}" readonly class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Tempat Acara</label>
                <input type="text" name="tempat_acara" value="{{$acara->tempat_acara}}" readonly class="form-control">
            </div>
            <div class="form-group mb-3 ">
                <label for="">Link</label>
                <input type="text" name="link" value="{{$acara->link}}" readonly class="form-control">
            </div>
            <a href="{{ route('acara.index') }}" class="btn btn-primary">Kembali</a>
            <a href="{{route('attendance.show', $acara->id)}}" class="btn btn-warning attendance" id="attendance">Absen</a>

        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Apakah Anda Akan Menghadiri Acara ini? 
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('attendance.store') }}" >
                        @csrf
                        <input type="text" readonly name="acara_id" value="{{$acara->id}}">
                        <div class="form-group">
                            <label for="">Silakan Scan, Jika tidak bisa masukan kode user</label>
                            <input type="text" name="barcode" class="form-control" placeholder="Masukan disini jika tidak bisa scan">
                        </div>
                        <button class="btn btn-success">Absen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    att = document.getElementById('attendance');
    absen = document.getElementById('absen');

    att.addEventListener('click', function() {
        console.log('clicked');
        if (absen.style.display === "none") {
            absen.style.display = "block";
        } else {
            absen.style.display = "none";
        }
    });
</script>


@endsection
