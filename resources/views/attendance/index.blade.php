@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        
        <form action="" method="post" class="form-control">
            @csrf
            <div class="form-group">
                <label for="">Masukkan Barcode</label>
                <input type="number" name="barcode" class="form-control">
            </div>
            <div class="form-group">
            @foreach($acara as $a)
                <input type="text" readonly value="{{$a->id}}">
            @endforeach
            </div>
            <button class="btn btn-success">Submit</button>
        </form>
        
    </div>
</div>
@endsection