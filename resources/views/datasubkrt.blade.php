@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Sub Kriteria</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Sub Kriteria</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="row">
    <div class="col-12">
      <!-- Tabel Harga (C1) -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Harga (C1)</h3>
          <div class="card-tools">
            <a href="{{ route('user.craetesubc1') }}" class="btn btn-success mb-3 ml-3">Tambah Data</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Sub Kriteria</th>
                <th>Nilai</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($harga as $h)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $h->nama_sub1 }}</td>
                <td>{{ $h->nilai1 }}</td>
                <td>
                  <a href="{{ route('user.editc1',['id' => $h->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                  <a data-toggle="modal" data-target="#modal-hapus{{ $h->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                </td>
              </tr>
              <div class="modal fade" id="modal-hapus{{ $h->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah kamu yakin ingin menghapus data kriteria <b>{{ $h->nama_sub1 }}</b></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <form action="{{ route('user.deletec1',['id'=> $h->id]) }}" method="POST">
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

  <div class="row">
    <div class="col-12">
      <!-- Tabel Model (C2) -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Model (C2)</h3>
          <div class="card-tools">
            <a href="{{ route('user.craetesubc2') }}" class="btn btn-success mb-3 ml-3">Tambah Data</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Sub Kriteria</th>
                <th>Nilai</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($model as $m)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $m->nama_sub2 }}</td>
                <td>{{ $m->nilai2 }}</td>
                <td>
                  <a href="{{ route('user.editc2',['id' => $m->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                  <a data-toggle="modal" data-target="#modal-hapus{{ $m->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                </td>
              </tr>
              <div class="modal fade" id="modal-hapus{{ $m->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah kamu yakin ingin menghapus data kriteria <b>{{ $m->nama_sub2 }}</b></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <form action="{{ route('user.deletec2',['id'=> $m->id]) }}" method="POST">
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

  <div class="row">
    <div class="col-12">
      <!-- Tabel IP (C3) -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">IP (C3)</h3>
          <div class="card-tools">
            <a href="{{ route('user.craetesubc3') }}" class="btn btn-success mb-3 ml-3">Tambah Data</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Sub Kriteria</th>
                <th>Nilai</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($iprat as $ip)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ip->nama_sub3 }}</td>
                <td>{{ $ip->nilai3 }}</td>
                <td>
                  <a href="{{ route('user.editc3',['id' => $ip->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                  <a data-toggle="modal" data-target="#modal-hapus{{ $ip->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                </td>
              </tr>
              <div class="modal fade" id="modal-hapus{{ $ip->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah kamu yakin ingin menghapus data kriteria <b>{{ $ip->nama_sub3 }}</b></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <form action="{{ route('user.deletec3',['id'=> $ip->id]) }}" method="POST">
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

  <div class="row">
    <div class="col-12">
      <!-- Tabel Tipe Layar (C4) -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tipe Layar (C4)</h3>
          <div class="card-tools">
            <a href="{{ route('user.craetesubc4') }}" class="btn btn-success mb-3 ml-3">Tambah Data</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Sub Kriteria</th>
                <th>Nilai</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tpelayar as $tpl)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tpl->nama_sub4 }}</td>
                <td>{{ $tpl->nilai4 }}</td>
                <td>
                  <a href="{{ route('user.editc4',['id' => $tpl->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                  <a data-toggle="modal" data-target="#modal-hapus{{ $tpl->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                </td>
              </tr>
              <div class="modal fade" id="modal-hapus{{ $tpl->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah kamu yakin ingin menghapus data kriteria <b>{{ $tpl->nama_sub4 }}</b></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <form action="{{ route('user.deletec4',['id'=> $tpl->id]) }}" method="POST">
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

  <div class="row">
    <div class="col-12">
      <!-- Tabel Baterai (C5) -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Baterai (C5)</h3>
          <div class="card-tools">
            <a href="{{ route('user.craetesubc5') }}" class="btn btn-success mb-3 ml-3">Tambah Data</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Sub Kriteria</th>
                <th>Nilai</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($baterai as $bt)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bt->nama_sub5 }}</td>
                <td>{{ $bt->nilai5 }}</td>
                <td>
                  <a href="{{ route('user.editc5',['id' => $bt->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                  <a data-toggle="modal" data-target="#modal-hapus{{ $bt->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                </td>
              </tr>
              <div class="modal fade" id="modal-hapus{{ $bt->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah kamu yakin ingin menghapus data kriteria <b>{{ $bt->nama_sub5 }}</b></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <form action="{{ route('user.deletec5',['id'=> $bt->id]) }}" method="POST">
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
</div>
<!-- /.content-wrapper -->
@endsection
