@extends('Layout.master')
@section('content')  

<div class="content-wrapper">
  <div class="content">
    <div class="container-fluid">
      <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8 col-md-6">               
                <h2 class="h2 pt-4">Tambah Status</h2>
                <hr>
                @if(session()->has('pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('pesan') }}
                    </div>
                @endif
                <form action="{{url('/Status/'.$status->id)}}" method="post">
                @method('PUT')
                @csrf
                <select name="status" id="status" class="form-control">
                  <option value="Karyawan Tetap" {{ $status->nama_status == 'Karyawan Tetap' ? 'selected' : '' }}>
                      Karyawan Tetap
                  </option>
                  <option value="Kontrak" {{ $status->nama_status == 'Kontrak' ? 'selected' : '' }}>
                      Kontrak
                  </option>
                  <option value="Magang" {{ $status->nama_status == 'Magang' ? 'selected' : '' }}>
                      Magang
                  </option>
                </select>
                @error('status')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                  <button type="submit" class="btn btn-info my-2"><i class="fa fa-save"></i> Simpan</button>
                  <a href="/Status" class="btn btn-primary my-2"><i class='fas fa-angle-double-left'></i> Kembali</a>
                </form>              
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection 