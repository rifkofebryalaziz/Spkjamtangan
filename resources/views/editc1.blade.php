@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header"> 
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Data Sub Kriteria Harga</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data Sub Kriteria</a></li>
            <li class="breadcrumb-item active">Edit Data Sub Kriteria Harga</li>
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
    <title>Form Edit Data Sub Kriteria Harga</title>
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
    <div class="container">
        <form action="{{ route('user.updatec1', $harga->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="namaKriteria">Nama Sub Kriteria C1</label>
                <input type="text" name="Namasubkrtc1" value="{{ $harga->nama_sub1 }}" class="form-control" id="namasubKriteria" placeholder="Masukan Nama Sub Kriteria">
            </div>
            {{-- @error('NamaKrt')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
            <div class="form-group">
                <label for="nilaic1">Nilai</label>
                <input type="text" name="nilaic1" value="{{ $harga->nilai1 }}" class="form-control" id="nilaic1" placeholder="Masukan Nilai">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</div>    
@endsection