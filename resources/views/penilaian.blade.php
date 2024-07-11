@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Perhitungan TOPSIS</h1>
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

              <h4>Normalisasi</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Alternatif</th>
                    @foreach($kriterias as $kriteria)
                      <th>{{ $kriteria->nama }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($alternatifs as $alternatif)
                    <tr>
                      <td>{{ $alternatif->nama }}</td>
                      @foreach($kriterias as $kriteria)
                        <td>{{ number_format($normalisasi[$alternatif->id][$kriteria->flag], 4) }}</td>
                      @endforeach
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <h4>Normalisasi Terbobot</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Alternatif</th>
                    @foreach($kriterias as $kriteria)
                      <th>{{ $kriteria->nama }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($alternatifs as $alternatif)
                    <tr>
                      <td>{{ $alternatif->nama }}</td>
                      @foreach($kriterias as $kriteria)
                        <td>{{ number_format($normalisasiTerbobot[$alternatif->id][$kriteria->flag], 4) }}</td>
                      @endforeach
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <h4>Solusi Ideal Positif (A+)</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    @foreach($kriterias as $kriteria)
                      <th>{{ $kriteria->nama }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach($solusiIdeal['Aplus'] as $value)
                      <td>{{ number_format($value, 4) }}</td>
                    @endforeach
                  </tr>
                </tbody>
              </table>

              <h4>Solusi Ideal Negatif (A-)</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    @foreach($kriterias as $kriteria)
                      <th>{{ $kriteria->nama }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach($solusiIdeal['Amin'] as $value)
                      <td>{{ number_format($value, 4) }}</td>
                    @endforeach
                  </tr>
                </tbody>
              </table>

              <h4>Jarak Solusi Ideal Positif (D+)</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Alternatif</th>
                    <th>Jarak</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($jarakIdeal['Dplus'] as $id => $value)
                    <tr>
                      <td>{{ $alternatifs->find($id)->nama }}</td>
                      <td>{{ number_format($value, 4) }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <h4>Jarak Solusi Ideal Negatif (D-)</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Alternatif</th>
                    <th>Jarak</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($jarakIdeal['Dmin'] as $id => $value)
                    <tr>
                      <td>{{ $alternatifs->find($id)->nama }}</td>
                      <td>{{ number_format($value, 4) }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <h4>Nilai Preferensi</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Alternatif</th>
                    <th>Nilai</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($preferensi as $id => $value)
                    <tr>
                      <td>{{ $alternatifs->find($id)->nama }}</td>
                      <td>{{ number_format($value, 4) }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <h4>Ranking Alternatif</h4>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Alternatif</th>
                    <th>Ranking</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($preferensi as $id => $value)
                    <tr>
                      <td>{{ $alternatifs->find($id)->nama }}</td>
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
