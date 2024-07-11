@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header"> 
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Data Sub Kriteria Baterai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data Sub Kriteria</a></li>
            <li class="breadcrumb-item active">Tambah Data Sub Kriteria Baterai</li>
          </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
        </form>
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content-header -->
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data Sub Kriteria Baterai</title>
    <style>
        .form-group {
            margin-bottom: 1rem;
        }

        .form-control {
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: #007bff;
            border: 1px solid #007bff;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container" >
        <form action="{{ route('user.storesubc5') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="namaKriteria">Nama Sub Kriteria C5</label>
                <input type="text" name="Namasubkrtc5" class="form-control" id="namasubKriteria" placeholder="Masukan Nama Sub Kriteria">
            </div>
            {{-- @error('NamaKrt')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
            <div class="form-group">
                <label for="nilaic1">Nilai</label>
                <input type="text" name="nilaic5" class="form-control" id="nilai" placeholder="Masukan Nilai">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</div>    
@endsection