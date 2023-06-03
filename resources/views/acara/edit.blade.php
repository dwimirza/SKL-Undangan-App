@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <p>Create Acara</p>
                    <form method="post" action="{{ route('acara.update', $acara->id) }}" placeholder="Nama Acara" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama Acara</label>
                            <input type="text" name="nama_acara" value="{{$acara->nama_acara}}" class="form-control mb-2">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Acara</label>
                            <select name="jenis_acara" id="jenis_acara" class="form-select">
                                <option value="online">Online</option>
                                <option value="offline">Offline</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Acara</label>
                            <input type="date" name="tanggal_acara" value="{{$acara->tanggal_acara}}" class="form-control mb-2">
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Acara</label>
                            <input type="text" name="tempat_acara" value="{{$acara->tempat_acara}}" class="form-control mb-2">
                        </div>
                        <div class="form-group">
                            <label for="">Link Acara</label>
                            <input type="text" name="link" value="{{$acara->link}}" class="form-control mb-2">
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" name="gambar" value="{{$acara->gambar}}" class="form-control mb-2">
                        </div>
                       <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
