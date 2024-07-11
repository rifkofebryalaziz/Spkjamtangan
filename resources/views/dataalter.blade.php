@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Alternatif</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Alternatif</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="row">
    <div class="col-12">
      <a href="{{ route('user.craete1') }}" class="btn btn-success mb-3 ml-3">Tambah Data</a>
      <div class="card">  
        <div class="card-header">
          <h3 class="card-title">Data Alternatif</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Model</th>
                <th>Water Resistan</th>
                <th>Tipe Layar</th>
                <th>Baterai</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($altr as $alt)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $alt->nama }}</td>
                <td>{{ $alt->C1 }}</td>
                <td>{{ $alt->C2 }}</td>
                <td>{{ $alt->C3 }}</td>
                <td>{{ $alt->C4 }}</td>
                <td>{{ $alt->C5 }}</td>
                <td>
                  <a href="{{ route('user.editalt',['id' => $alt->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                  <a data-toggle="modal" data-target="#modal-hapus{{ $alt->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                </td>
              </tr>
              <div class="modal fade" id="modal-hapus{{ $alt->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah kamu yakin ingin menghapus data kriteria <b>{{ $alt->nama }}</b></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <form action="{{ route('user.deletealt',['id'=> $alt->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Ya Hapus Data</button>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.content -->
</div>    
@endsection