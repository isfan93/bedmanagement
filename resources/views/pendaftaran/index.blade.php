@extends('layout.admin')

{{-- JUDUL HALAMAN ---------------------------------------------------------------------------------------------------------- --}}
@section('title','Pendaftaran')

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
        <div class="col-md-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                  <h3 class="card-title">
                    <i class="fas fa-table"></i>
                    Informasi Bed RSIH
                  </h3>
                  <div>
                    {{-- <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tipebarang"> <i class="fas fa-upload"> </i> Tambah Pasien Booking</button> --}}
                    <a href="{{ url('pendaftaran/create')}}" class="btn btn-info btn-sm"> <i class="fas fa-upload"> </i> Tambah Pasien Booking</a>
                  </div>
              </div>
            </div>
            <div class="card-body">
              <table id="tabeldokter" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="15px" style="text-align: center">NO</th>
                    <th width="20%" style="text-align: center">BED</th>
                    <th width="20%" style="text-align: center">STATUS BED</th>
                    <th style="text-align: center">DATA PASIEN</th>
                    <th style="text-align: center">STATUS PASIEN</th>
                    {{-- <th>#</th> --}}
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1 ?>
                  @foreach ($beds as $bed)
                    <tr>
                      <td style="text-align: center">{{ $no }}</td>
                      <td>
                        No Bed: <b>{{$bed->namabed}}</b><br>
                        Kelas Pelayanan: <b>{{$bed->kelas}}</b><br>
                        Ruangan: <b>{{$bed->ruangan}}</b>
                        </td>
                      <td style="text-align: center">
                        @if ($bed->bedstatus==0)
                          <h4><span class="badge readytouse">READY TO USE</span></h4>
                        @elseif ($bed->bedstatus==8)
                          <h4><span class="badge female">TERISI : WANITA</span></h4>
                        @elseif ($bed->bedstatus==2)
                          <h4><span class="badge rencanapulang">RENCANA PULANG</span></h4>
                        @elseif ($bed->bedstatus==3)
                          <h4><span class="badge readytoclean">READY TO CLEAN</span></h4>
                        @elseif ($bed->bedstatus==4)
                          <h4><span class="badge booking">BOOKING</span></h4>
                        @elseif ($bed->bedstatus==5)
                          <h4><span class="badge waitinglist">WAITING LIST</span></h4>
                        @elseif ($bed->bedstatus==6)
                          <h4><span class="badge renovasi">RENOVASI</span></h4>
                        @elseif ($bed->bedstatus==7)
                          <h4><span class="badge male">TERISI : PRIA</span></h4>
                        @endif
                      </td>
                      @if ($bed->trx_id<>null)
                        <td>
                          <div class="row">
                            <div class="col-sm-6">
                              Nama Pasien: <b>{{ $bed->trxPasien->namapasien}}</b><br>
                              No Rekmed: <b>{{ $bed->trxPasien->norekmed}}</b><br>
                              Alamat: <b>{{ $bed->trxPasien->alamatpasien}}</b>
                            </div>
                            <div class="col-sm-6">
                              Tanggal Lahir: <b>
                                                @php
                                                    $tanggallahir = date('d-m-Y', strtotime($bed->trxPasien->tgllahir));
                                                    $usia = date_diff(date_create($bed->trxPasien->tgllahir),date_create(\Carbon\Carbon::now()))->y;
                                                @endphp
                              {{ $tanggallahir }}</b><br>                              
                              Usia: <b>{{$usia}}</b> Tahun<br>
                              Diagnosa: <b>{{ $bed->trxPasien->diagnosa}}</b><br>
                              Keterangan: <b>{{ $bed->trxPasien->keterangan}}</b><br>
                            </div>
                          </div>
                        </td>    
                      @else
                        <td style="text-align: center"> - Empty -</td>
                      @endif
                      <td>
                        @if (empty($bed->trxBooking->status))
                          -
                        @elseif($bed->trxBooking->status=='booking')
                          <h4><span class="badge booking">{{strtoupper($bed->trxBooking->status)}}</span></h4>
                        @elseif($bed->trxBooking->status=='batal booking')
                          <h4><span class="badge renovasi">{{strtoupper($bed->trxBooking->status)}}</span></h4>
                        @elseif($bed->trxBooking->status=='request pindah')
                          <h4><span class="badge booking">{{strtoupper($bed->trxBooking->status)}}</span></h4>
                        @elseif($bed->trxBooking->status=='approve')
                          <h4><span class="badge terisi">{{strtoupper($bed->trxBooking->status)}}</span></h4>
                        @elseif($bed->trxBooking->status=='batal pindah')
                          <h4><span class="badge renovasi">{{strtoupper($bed->trxBooking->status)}}</span></h4>
                        @endif
                      </td>
                    </tr>
                    <?php $no++ ?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
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
      $("#tabeldokter").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#tabeldokter_wrapper .col-md-6:eq(0)');
    });
</script>

{{-- Menampilkan Message menggunakan library Toastr --}}
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