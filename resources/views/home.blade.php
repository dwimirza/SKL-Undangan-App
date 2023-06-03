@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                    <h4 class="text-center mb-5">Welcome {{ Auth::user()->name }}</h4>
                    @if(!$tamu)
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
                    @else
                    <table class="table table-hover table-striped table-bordered">
                        <tr>
                            <th>Nama</th>
                            <th>{{Auth::user()->name}}</th>
                            @foreach($tamu as $t)
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>{{$t->jenis_kelamin}}</td>
                        </tr>
                        <tr>
                            <td>Alamat Tamu</td>
                            <td>{{$t->alamat}}</td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td>{{$t->no_hp}}</td>
                        </tr>
                        <tr>
                            <td>Barcode</td>
                            <td> <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('$t->barcode', 'QRCODE')}}" alt="barcode" /></td>

                        </tr>
                        @endforeach
                    </table>
                    @endif
                    <a href="{{route('acara.index')}}" class="btn btn-primary">List Acara</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
