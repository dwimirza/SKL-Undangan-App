@extends('layouts.app')
@section('content')

<div class="container">
    <h4 class="">List Acara</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Acara</th>
                <th>Jenis Acara</th>
                <th>Tanggal</th>
                <th>Tempat</th>
                <th>Link</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($acara as $a)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $a->nama_acara }}</td>
                <td>{{ $a->jenis_acara }}</td>
                <td>{{ $a->tanggal_acara }}</td>
                <td>{{$a->tempat_acara}}</td>
                <td>{{ $a->link }}</td>
                <td><img src="{{asset('/images/'.$a->gambar)}}" style="width: 100px;"></td>
                <td>
                    <a href="{{ url('acara/'.$a->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ url('acara/'.$a->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <form action="{{ url('acara/'.$a->id)}}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin hapus data?')">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('acara.create')}}" class="btn btn-success">Buat Acara</a>
    <p class="text-center opacity-25">Ananda Dwi Mirza</p>
</div>



@endsection
