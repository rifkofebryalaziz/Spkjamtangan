@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <form action="{{ route('user.store1') }}" method="POST">
        @csrf
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Alternatif</a></li>
              <li class="breadcrumb-item active">Tambah Data</li>
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
    <title>Form Tambah Data</title>
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

        .scroll-container {
            max-height: 600px; /* Atur tinggi maksimum container sesuai kebutuhan */
            overflow-y: auto; /* Menambahkan scrollbar vertikal */
            overflow-x: hidden; /* Menyembunyikan scrollbar horizontal jika tidak dibutuhkan */
            border: 1px solid #ccc; /* Opsional: memberikan border pada container */
            padding: 10px; /* Opsional: memberikan padding pada container */
        }
    </style>
  </head>
  <body>
    <div class="container scroll-container">
        <form action="{{ route('user.store1') }}" method="POST">
          @csrf
            <div class="form-group">
                <label for="kodeKriteria">Nama Smartwatch</label>
                <input type="text"  name="namesm" class="form-control" id="namaKriteria" placeholder="Masukan Nama Smartwatch">
            </div>
            <div class="form-group">
                <label for="namaKriteria">Harga</label>
                <input type="number"  name="harga" class="form-control" id="kodeKriteria" name="kodeKriteria" placeholder="Masukan Nilai Harga Smartwatch">
            </div>
            <div class="form-group">
                <label for="bobot">Model</label>
                <input type="number"  name="model" class="form-control" id="bobot" placeholder="Masukan Model Smartwatch">
            </div>
            <div class="form-group">
                <label for="bobot">Water Resistan</label>
                <input type="number"  name="wtrs" class="form-control" id="bobot" placeholder="Masukan IP Rating Smartwatch">
            </div>
            <div class="form-group">
                <label for="bobot">Tipe Layar</label>
                <input type="number"  name="tplyr" class="form-control" id="bobot" placeholder="Masukan Tipe Layar Smartwatch">
            </div>
            <div class="form-group">
                <label for="bobot">Baterai</label>
                <input type="number"  name="baterai" class="form-control" id="bobot" placeholder="Masukan Daya Tahan Baterai Smartwatch">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </body>
</div>    
@endsection
