@extends('layout.admin')

{{-- JUDUL HALAMAN ---------------------------------------------------------------------------------------------------------- --}}
@section('title','Laporan Keperawatan')

{{-- CSS -------------------------------------------------------------------------------------------------------------------- --}}
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

{{-- KONTEN ----------------------------------------------------------------------------------------------------------------- --}}
@section('konten')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>@yield('title')</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content text-sm">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-info card-outline">
            

            <div class="card-body">
              <h3>Data PPJA</h3>
              <form action="{{ route('laporan.index') }}" method="get">
                <div class="row justify-content-start">
                
                    <div class="col-4">
                      <input name="start_date" type="date" class="form-control form-control-sm">
                    </div>
                    <div class="col-4">
                      <input name="end_date" type="date" class="form-control form-control-sm">
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary btn-sm" type="submit">Sortir</button>
                    </div>
                  </div>
                </form>
                <br>
              <table id="tabelperawat" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="15px">no</th>
                    {{-- <th>Id PPJA</th> --}}
                    <th>Nama PPJA</th>
                    <th>Tanggal</th>
                    <th>Jumlah Pasien</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1 ?>
                  @foreach ($datapr as $perawat)
                    <tr>
                      <td>{{ $no++ }}</td>
                        {{-- @foreach ($perawat->Pasien as $pr)
                        <td>{{$pr->namaperawat}}</td>
                        @endforeach --}}
                      <td>{{$perawat->nama_perawat}}</td>
                      <td>{{$perawat->tanggal}}</td>
                      <td>{{$perawat->jumlah_pasien}}</td>
                      
                    </tr>

                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card card-info card-outline">
            

            <div class="card-body">
              <h3>Data Dokter</h3>
              <form action="{{ route('laporan.getDataDokter') }}" method="get">
                <div class="row justify-content-start">
                
                    <div class="col-4">
                      <input name="start_date" type="date" class="form-control form-control-sm">
                    </div>
                    <div class="col-4">
                      <input name="end_date" type="date" class="form-control form-control-sm">
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary btn-sm" type="submit">Sortir</button>
                    </div>
                  </div>
                </form>
                <br>
              <table id="tabeldokter" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="15px">no</th>
                    {{-- <th>Id PPJA</th> --}}
                    <th>Dokter DPJP</th>
                    <th>Tanggal</th>
                    <th>Jumlah Pasien</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1 ?>
                  @foreach ($datadr as $dokter)
                    <tr>
                      <td>{{ $no++ }}</td>
                        {{-- @foreach ($perawat->Pasien as $pr)
                        <td>{{$pr->namaperawat}}</td>
                        @endforeach --}}
                      <td>{{$dokter->nama_dokter}}</td>
                      <td>{{$dokter->tanggal}}</td>
                      <td>{{$dokter->total_pasien}}</td>
                      {{-- <td>{{ $jumlahData }}</td> --}}
                      
                    </tr>

                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card card-info card-outline">
            

            <div class="card-body">
              <h3>Waktu Pulang Pasien</h3>
              <form action="{{ route('laporan.index') }}" method="get">
                <div class="row justify-content-start">
                
                    <div class="col-4">
                      <input name="start_date" type="date" class="form-control form-control-sm">
                    </div>
                    <div class="col-4">
                      <input name="end_date" type="date" class="form-control form-control-sm">
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary btn-sm" type="submit">Sortir</button>
                    </div>
                  </div>
                </form>
                <br>
              <table id="pasienpulang" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="15px">no</th>
                    <th>Nama Pasien</th>
                    <th>Ruangan</th>
                    <th>Rencana Pulang</th>
                    <th>Pasien Pulang</th>
                    <th>Waktu Pulang Pasien</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1 ?>
                  @foreach ($waktuPxPulang as $wpp)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{$wpp->namapasien}}</td>
                      <td>{{$wpp->ruangan}}</td>
                      <td>{{$wpp->rencanapulang}}</td>
                      <td>{{$wpp->pasienpulang}}</td>
                      <td>{{$wpp->waktu_pulang_pasien}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        

        {{-- <div class="col-md-4">
          <div class="card card-info card-outline">
            <div class="card-body">
              <h3>Waktu Pulang Pasien</h3>
              <table id="pasienpulang" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="15px">no</th>
                    <th>Nama Pasien</th>
                    <th>Ruangan</th>
                    <th>Rencana Pulang</th>
                    <th>Pasien Pulang</th>
                    <th>Waktu Pulang Pasien</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1 ?>
                  @foreach ($waktuPxPulang as $wpp)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{$wpp->namapasien}}</td>
                      <td>{{$wpp->ruangan}}</td>
                      <td>{{$wpp->rencanapulang}}</td>
                      <td>{{$wpp->pasienpulang}}</td>
                      <td>{{$wpp->waktu_pulang_pasien}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div> --}}

      </div>
    </div>
@endsection

{{-- JS --------------------------------------------------------------------------------------------------------------------- --}}
@section('js')
  <!-- DataTables  & Plugins -->
  <script src="{{asset('adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{asset('adminlte')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('adminlte')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{asset('adminlte')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="{{asset('adminlte')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{asset('adminlte')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="{{asset('adminlte')}}/plugins/jszip/jszip.min.js"></script>
  <script src="{{asset('adminlte')}}/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="{{asset('adminlte')}}/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="{{asset('adminlte')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="{{asset('adminlte')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="{{asset('adminlte')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script>
    $(function () {
      $("#tabelperawat").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#tabelperawat_wrapper .col-md-6:eq(0)');
    });

    $(function () {
      $("#tabeldokter").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#tabeldokter_wrapper .col-md-6:eq(0)');
    });

    $(function () {
      $("#pasienpulang").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#pasienpulang_wrapper .col-md-6:eq(0)');
    });
</script>
  @if (Session::has('success'))
    <script>
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
      }
      toastr.success("{{Session::get('success')}}","Success!",{timeOut:15000});
      // toastr.info("{{Session::get('success')}}","Success!",{timeOut:10000});
      // toastr.warning("{{Session::get('success')}}","Success!",{timeOut:10000});
      // toastr.error("{{Session::get('success')}}","Success!",{timeOut:10000});

    </script>
  @endif
@endsection