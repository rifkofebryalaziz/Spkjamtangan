@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="profile-card">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('changePassword') }}" method="POST">
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukan email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Password lama</label>
                <input type="password" name="current_password" class="form-control" id="password" placeholder="Masukan Password Lama" >
            </div>
            <div class="form-group">
              <label for="username">Password Baru</label>
              <input type="text"  name="new_passwordd" class="form-control" id="password" placeholder="Masukan Password Baru" >
          </div>
            <div class="form-group">
              <label for="password">Confirmasi Password</label>
              <input type="password" name="new_password_confirmation" class="form-control" id="password" placeholder="Confirmasi Password">
          </div>
            <button type="submit" class="btn btn-success">Update</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>    
@endsection
{{-- value="{{ old('email') }}"
value="{{ old('password') }}"
value="{{ old('nama') }}" --}}