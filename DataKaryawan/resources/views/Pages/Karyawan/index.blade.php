@extends('Layout.new_master')
@section ('title','Form Karyawan')
@section ('formKaryawan','active')
@section('content')

  <div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
        <div class="container mt-3">
          <div class="row">
              <div class="col-12">
                      <h1 class="h2 mr-auto">Tabel Data Karyawan</h1>
                      <a href="{{ url('/Data-Karyawan/create') }}" class="btn btn-success mb-2"><i class="fa fa-plus"></i> Tambah Data</a>
                  @if(session()->has('pesan'))
                      <div class="alert alert-success" role="alert">
                          {{ session()->get('pesan') }}
                      </div>
                  @endif
                  <table class="table table-striped display responsive nowrap" style="width:100%" id="example">
                      <thead>
                          <tr>
                              <th></th>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Alamat</th>
                              <th>Umur</th>
                              <th>Jenis Kelamin</th>
                              <th>No. HP</th>
                              <th>Tanggal Lahir</th>
                              <th>Jabatan</th>
                              <th>Status</th>
                              <th>Pendidikan</th>
                              <th>Tanggal Masuk</th>
                              <th>Opsi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @forelse ($karyawan as $item)
                          <tr>
                              <td></td>
                              <th>{{$loop->iteration}}</th>
                              <td>{{$item->nama}}</td>
                              <td>{{$item->alamat}}</td>
                              <td>{{$item->umur}}</td>
                              <td>{{$item->jenis_kelamin}}</td>
                              <td>{{$item->no_hp}}</td>
                              <td>{{$item->tgl_lahir}}</td>
                              <td>{{$item->jabatan->nama_jabatan}}</td>
                              <td>{{$item->status->nama_status}}</td>
                              <td>{{$item->pendidikan->pendidikan}}</td>
                              <td>{{$item->tgl_masuk}}</td>
                              <td>
                                  <form class="d-inline" action="{{ route ('Data-Karyawan.edit', $item->id) }}" method="GET">
                                      @csrf
                                      @method('Put')
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                  </form>
                                    
                                  <form class="d-inline" action="{{ route ('Data-Karyawan.destroy', $item->id) }}" method="post">
                                      @csrf
                                      @method('delete')
                                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                  </form>
                              </td>
                          </tr>
                          @empty
                              <td colspan="12" class="text-center">Data Kosong</td>
                          @endforelse
                      </tbody>
                  </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
