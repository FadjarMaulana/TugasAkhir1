@extends('Layout.master')
@section('content')  

<div class="content-wrapper">
  <div class="content">
    <div class="container-fluid">
      <div class="container mt-3">
        <div class="row mx-auto">
            <div class="col-sm-8 col-md-6">               
                <h2 class="h2 pt-4">Tambah Data Karyawan</h2>
                <hr>
                @if(session()->has('pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('pesan') }}
                    </div>
                @endif
                <form action="{{url('/Data-Karyawan')}}" method="post">
                @csrf
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" @error('nama') is-invalid @enderror id="nama" placeholder="Masukan Nama" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea name="alamat" id="alamat" cols="3" class="form-control" @error('alamat') is-invalid @enderror placeholder="Masukan Alamat">{{old('alamat')}}</textarea>
                        @error('alamat')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="umur">Umur</label>
                      <input type="text" class="form-control" id="umur" @error('umur') is-invalid @enderror placeholder="Masukan Umur" name="umur" value="{{ old('umur') }}">
                        @error('umur')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="jenis_kelamin">Jenis kelamin</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="jenis_kelamin" id="laki-laki" value="Laki-laki" {{old('jenis_kelamin') == 'Laki-laki' ?'checked' : ''}}>
                      <label for="Laki-laki" class="form form-check-input">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" name="jenis_kelamin" id="laki-laki" value="Perempuan" {{old('jenis_kelamin') == 'Perempuan' ?'checked' : ''}}>
                      <label for="perempuan" class="form form-check-input">perempuan</label>
                    </div>
                    @error('jenis_kelamin')
                      <div class="alert alert-danger">{{($message)}}</div>
                    @enderror

                    <div class="form-group">
                      <label for="no_hp">No. HP</label>
                      <input type="text" class="form-control" @error('no_hp') is-invalid @enderror placeholder="Masukan No. HP" id="no_hp" name="no_hp" value="{{old('no_hp')}}">
                      @error('no_hp')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                      <input type="date" class="form-control" @error('tgl_lahir') is-invalid @enderror id="tgl_lahir" name="tgl_lahir" value="{{old('tgl_lahir')}}">
                      @error('tgl_lahir')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="jabatan_id">Jabatan</label>
                      <select name="jabatan_id" id="jabatan_id" class="form-control">
                        @foreach($jabatans as $jabatan)
                          <option value="{{$jabatan->id}}" {{old('jabatan_id') == "$jabatan->nama_jabatan" ? 'selected' : ''}}>{{ $jabatan->nama_jabatan }}</option>
                        @endforeach
                      </select>
                      @error('jabatan_id')
                        <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="status_id">Status</label>
                      <select name="status_id" id="status_id" class="form-control">
                        @foreach($statuses as $status)
                          <option value="{{$status->id}}" {{old('status_id') == "$status->nama_status" ? 'selected' : ''}}>{{ $status->nama_status }}</option>
                        @endforeach
                      </select>
                      @error('status_id')
                        <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="pendidikan_id">Pendidikan</label>
                      <select name="pendidikan_id" id="pendidikan_id" class="form-control">
                        @foreach($pendidikans as $pendidikan)
                          <option value="{{$pendidikan->id}}" {{old('pendidikan_id') == "$pendidikan->pendidikan" ? 'selected' : ''}}>{{ $pendidikan->pendidikan }}</option>
                        @endforeach
                      </select>
                      @error('pendidikan_id')
                        <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="tgl_masuk">Tanggal Masuk</label>
                      <input type="date" class="form-control" @error('tgl_masuk') is-invalid @enderror id="tgl_masuk" name="tgl_masuk" value="{{old('tgl_masuk')}}">
                      @error('tgl_masuk')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <button type="submit" class="btn btn-info my-2"><i class="fa fa-save"></i> Simpan</button>
                    <a href="/Data-Karyawan" class="btn btn-primary my-2"><i class='fas fa-angle-double-left'></i> Kembali</a>
                </form>              
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection 