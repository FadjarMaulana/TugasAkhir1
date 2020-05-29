@extends('Layout.master')
@section('content')  

<div class="content-wrapper">
  <div class="content">
    <div class="container-fluid"> 
      <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8 col-md-6">               
                <h2 class="h2 pt-4">Tambah Jabatan</h2>
                <hr>
                @if(session()->has('pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('pesan') }}
                    </div>
                @endif
                <form action="{{url('/Jabatan')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="nama_jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="nama_jabatan"  placeholder="Masukan Jabatan" name="nama_jabatan" value="{{ old('nama_jabatan') }}">
                            @error('nama_jabatan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-info my-2"><i class="fa fa-save"></i> Simpan</button>
                    <a href="/Jabatan" class="btn btn-primary my-2"><i class='fas fa-angle-double-left'></i> Kembali</a>
                </form>              
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection 