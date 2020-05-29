@extends('Layout.master')
@section ('title','Form Status')
@section ('formStatus','active')
@section('content')

<div class="content-wrapper">
  <div class="content">
    <div class="container-fluid">
        <div class="container mt-3">
          <div class="row">
              <div class="col-12">
                      <h1 class="h2 mr-auto">Tabel Status</h1>
                      <a href="{{ url('/Status/create') }}" class="btn btn-success mb-2"><i class="fa fa-plus"></i> Tambah Status</a>
                  @if(session()->has('pesan'))
                      <div class="alert alert-success" role="alert">
                          {{ session()->get('pesan') }}
                      </div>
                  @endif
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Status</th>
                              <th>Opsi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @forelse ($status as $item)
                          <tr>
                              <th>{{$loop->iteration}}</th>
                              @if ($item->nama_status === "Karyawan Tetap")
                                  <td class="badge badge-info mt-2">{{ $item->nama_status }}</td>
                                  @elseif($item->nama_status === "Kontrak")
                                  <td class="badge badge-success mt-2">{{ $item->nama_status }}</td>
                                  @else
                                  <td class="badge badge-danger mt-2">{{ $item->nama_status }}</td>
                              @endif
                              <td>
                                  <form class="d-inline" action="{{ route ('Status.edit', $item->id) }}" method="GET">
                                      @csrf
                                      @method('Put')
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                  </form>
                                    
                                  <form class="d-inline" action="{{ route ('Status.destroy', $item->id) }}" method="post">
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
