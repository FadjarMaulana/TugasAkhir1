@extends('Layout.master')
@section ('title','Form Jabatan')
@section ('formJabatan','active')
@section('content')

<div class="content-wrapper">
  <div class="content">
    <div class="container-fluid"> 
        <div class="container mt-3">
          <div class="row">
              <div class="col-12">
                      <h1 class="h2 mr-auto">Tabel Jabatan</h1>
                      <a href="{{ url('/Jabatan/create') }}" class="btn btn-success mb-2"><i class="fa fa-plus"></i> Tambah Jabatan</a>
                  @if(session()->has('pesan'))
                      <div class="alert alert-success" role="alert">
                          {{ session()->get('pesan') }}
                      </div>
                  @endif
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Jabatan</th>
                              <th>Opsi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @forelse ($jabatan as $item)
                          <tr>
                              <th>{{$loop->iteration}}</th>
                              <td>{{$item->nama_jabatan}}</td>
                              <td>
                                  <form class="d-inline" action="{{ route ('Jabatan.edit', $item->id) }}" method="GET">
                                      @csrf
                                      @method('Put')
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                  </form>
                                    
                                  <form class="d-inline" action="{{ route ('Jabatan.destroy', $item->id) }}" method="post">
                                      @csrf
                                      @method('delete')
                                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                  </form>
                              </td>
                          </tr>
                          @empty
                              <td colspan="6" class="text-center">Data Kosong</td>
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
