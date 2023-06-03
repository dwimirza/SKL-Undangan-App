@extends('layouts.app')
@section('content')

<form action="{{ route('tamu.store') }}" method="post">
    @csrf
    <div class="container">
        <input type="text" name="id_user" value="{{Auth::user()->id}}" hidden>
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="" class="form-select">
                <option value="Laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Alamat Tamu</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat">
        </div>
        <div class="form-group">
            <label for="">No. HP</label>
            <input type="number" name="no_hp" class="form-control" placeholder="Masukkan No. HP">
        </div>
        <input type="hidden" name="barcode">
        <button class="btn btn-success">Submit</button>
    </div>
</form>

@endsection
