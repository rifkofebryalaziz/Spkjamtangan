@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Hasil Akhir</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h4>Ranking Alternatif</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nama Alternatif</th>
                    <th>Hasil Akhir</th>
                    <th>Rangking</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($preferensi as $id => $value)
                  <tr>
                    <td>{{ $alternatifs->find($id)->nama }}</td>
                    <td>{{ number_format($value, 4) }}</td>
                    <td>{{ $loop->iteration }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
