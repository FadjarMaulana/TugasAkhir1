@extends('Layout.master')
@section('content')  

<div class="content-wrapper">
  <div class="content">
    <div class="container-fluid">
      <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8 col-md-6">               
                <h2 class="h2 pt-4">Tambah Pendidikan</h2>
                <hr>
                @if(session()->has('pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('pesan') }}
                    </div>
                @endif
                <form action="{{url('/Pendidikan/'.$pendidikan->id)}}" method="post">
                @method('PUT')
                @csrf
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <input type="text" class="form-control" id="pendidikan" placeholder="Masukan Pendidikan" name="pendidikan" value="{{ $pendidikan->pendidikan }}">
                            @error('pendidikan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-info my-2"><i class="fa fa-save"></i> Simpan</button>
                    <a href="/Pendidikan" class="btn btn-primary my-2"><i class='fas fa-angle-double-left'></i> Kembali</a>
                </form>              
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection 