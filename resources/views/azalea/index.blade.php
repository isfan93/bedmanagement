@extends('layout.admin')

{{-- JUDUL HALAMAN ---------------------------------------------------------------------------------------------------------- --}}
@section('title','Azalea')

{{-- CSS -------------------------------------------------------------------------------------------------------------------- --}}
@section('css')
  {{-- auto refresh --}}
  <meta http-equiv="refresh" content="60">
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
    </div>
  <!-- /.container-fluid -->
  </section>

  <section class="content text-sm">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-8 col-8">
          {{-- Start Card --}}
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">
                  <i class="fas fa-table"></i>
                  VVIP
                </h3>
                <div>
                  Jumlah Bed : <b>{{$jmlBedVvip}}</b> Bed
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                {{-- pembatas BED --}}
                @foreach ($vvips as $vvip)
                  <div class="col-sm-6 col-6">
                    <div class="card card-default card-outline
                      @if($vvip->bedstatus==2)
                        rencanapulang
                      @elseif($vvip->bedstatus==3)
                        readytoclean
                      @elseif($vvip->bedstatus==4)
                        booking
                      @elseif($vvip->bedstatus==5)
                        waitinglist
                      @elseif($vvip->bedstatus==6)
                        renovasi
                      @elseif($vvip->bedstatus==7)
                        male
                      @elseif($vvip->bedstatus==8)
                        female
                      @endif
                    ">
                      <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                          <h3 class="card-title">
                            <i class="fas fa-bed"></i> | <b>{{$vvip->namabed}}</b> | <b>
                              @if($vvip->bedstatus==0)
                                Ready To Use
                              @elseif($vvip->bedstatus==2)
                                Rencana Pulang
                              @elseif($vvip->bedstatus==3)
                                Ready To Clean
                              @elseif($vvip->bedstatus==4)
                                Booking
                              @elseif($vvip->bedstatus==5)
                                Waiting List
                              @elseif($vvip->bedstatus==6)
                                Renovasi
                              @elseif($vvip->bedstatus==7)
                                Male
                              @elseif($vvip->bedstatus==8)
                                Female
                              @endif</b>
                          </h3>
                          <div>
                            PPJA : <b>
                              @if (empty($vvip->namappja))
                                <b>-</b>
                              @else
                                Test
                              @endif</b>
                          </div>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <div class="container-fluid">
                          <table class="table table-sm table-borderless">
                            <tr>
                              <td>
                                @if (empty($vvip->namapasien))
                                  <b>-</b>
                                @else
                                  {{$vvip->namapasien}}
                                @endif
                              </td>
                              <td class="text-right">
                                <b>{{$vvip->norekmed}}</b>
                                @php
                                  $tanggallahir = date('d-m-Y', strtotime($vvip->tgllahir));
                                  $usia = date_diff(date_create($vvip->tgllahir),date_create(\Carbon\Carbon::now()))->y;
                                @endphp
                              </td>
                            </tr>
                            @if($vvip->bedstatus==0)
                              <tr>
                                <td>
                                  <b>-</b>
                                </td>
                                <td class="text-right">
                                  <b>- Tahun</b>
                                </td>
                              </tr>
                            @elseif($vvip->bedstatus==2)
                              <tr>
                                <td>
                                  <b>
                                    {{$tanggallahir}}
                                  </b>
                                </td>
                                <td class="text-right">
                                  <b>{{$usia}} Tahun</b>
                                </td>
                              </tr>
                            @elseif($vvip->bedstatus==3)
                              <tr>
                                <td>
                                  <b>-</b>
                                </td>
                                <td class="text-right">
                                  <b>- Tahun</b>
                                </td>
                              </tr>
                            @elseif($vvip->bedstatus==4)
                              <tr>
                                <td>
                                  <b>
                                    {{$tanggallahir}}
                                  </b>
                                </td>
                                <td class="text-right">
                                  <b>{{$usia}} Tahun</b>
                                </td>
                              </tr>
                            @elseif($vvip->bedstatus==5)
                              <tr>
                                <td>
                                  <b>
                                    {{$tanggallahir}}
                                  </b>
                                </td>
                                <td class="text-right">
                                  <b>{{$usia}} Tahun</b>
                                </td>
                              </tr>
                            @elseif($vvip->bedstatus==6)
                              <tr>
                                <td>
                                  <b>-</b>
                                </td>
                                <td class="text-right">
                                  <b>- Tahun</b>
                                </td>
                              </tr>
                            @elseif($vvip->bedstatus==7)
                              <tr>
                                <td>
                                  <b>
                                    {{$tanggallahir}}
                                  </b>
                                </td>
                                <td class="text-right">
                                  <b>{{$usia}} Tahun</b>
                                </td>
                              </tr>
                            @elseif($vvip->bedstatus==8)
                              <tr>
                                <td>
                                  <b>
                                    {{$tanggallahir}}
                                  </b>
                                </td>
                                <td class="text-right">
                                  <b>{{$usia}} Tahun</b>
                                </td>
                              </tr>
                            @endif
                          </table>
                          <hr>
                          <table class="table table-sm table-borderless">
                            @if (!empty($vvip->namadpjp1))
                              <tr>
                                <td>
                                  DPJP 1 : 
                                </td>
                                <td>
                                  <b>{{$vvip->namadpjp1}}</b>
                                </td>
                              </tr>
                            @endif
                            @if (!empty($vvip->namadpjp2))
                              <tr>
                                <td>
                                  DPJP 2 : 
                                </td>
                                <td>
                                  <b>{{$vvip->namadpjp2}}</b>
                                </td>
                              </tr>
                            @endif
                            @if (!empty($vvip->namadpjp3))
                              <tr>
                                <td>
                                  DPJP 3 : 
                                </td>
                                <td>
                                  <b>{{$vvip->namadpjp3}}</b>
                                </td>
                              </tr>
                            @endif
                            @if (!empty($vvip->namadpjp4))
                              <tr>
                                <td>
                                  DPJP 4 : 
                                </td>
                                <td>
                                  <b>{{$vvip->namadpjp4}}</b>
                                </td>
                              </tr>
                            @endif
                            @if (!empty($vvip->namadpjp5))
                              <tr>
                                <td>
                                  DPJP 5 : 
                                </td>
                                <td>
                                  <b>{{$vvip->namadpjp5}}</b>
                                </td>
                              </tr>
                            @endif
                            @if (!empty($vvip->namadpjp6))
                              <tr>
                                <td>
                                  DPJP 6 : 
                                </td>
                                <td>
                                  <b>{{$vvip->namadpjp6}}</b>
                                </td>
                              </tr>
                            @endif
                          </table>
                          <hr>
                          <table class="table table-sm table-borderless">
                            <tr>
                              <td>
                                <b>{{$vvip->diagnosa}}</b>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <b>{{$vvip->namapenjamin}}</b>
                              </td>
                            </tr>
                          </table>
                          <hr>
                          <table class="table table-sm table-borderless">
                            <tr>
                              <td>
                                <b>{{$vvip->keterangan}}</b>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      @if ($vvip->bedstatus<>0)
                        <div class="card-footer">
                          <div class="btn-group container-fluid  p-0">
                            <a href='#' class='btn btn-sm btn-primary'><i class="fas fa-check"></i> UPDATE DATA BED</a>
                            <a href='#' class='btn btn-sm btn-info'><i class="fas fa-times-circle"></i> VISITE DOKTER</a>
                          </div>
                        </div>    
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          {{-- End Card VVIP--}}
          {{-- Start Card VIP--}}
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">
                  <i class="fas fa-table"></i>
                  VIP
                </h3>
                <div>
                  Jumlah Bed : <b>{{$jmlBedVip}}</b> Bed
                </div>
              </div>
            </div>
            <div class="card-body">
              {{-- ISI KONTEN VIP --}}
            </div>
          </div>
          {{-- End Card --}}
          {{-- Start Card --}}
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">
                  <i class="fas fa-table"></i>
                  KELAS 2
                </h3>
                <div>
                  Jumlah Bed : <b>{{$jmlBedKelas2}}</b> Bed
                </div>
              </div>
            </div>
            <div class="card-body">
              {{-- KONTEN bed --}}
            </div>
          </div>
          {{-- End Card --}}
        </div>
        <!-- ./col -->
        <div class="col-sm-4 col-4">
          <div class="row">
            {{-- INFO 1 --}}
            <div class="col-lg-4 col-4">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $pxTotal }}</h3>
                  <p>Seluruh Pasien</p>
                </div>
              </div>
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $bedKosong }}</h3>
                  <p>Bed Kosong</p>
                </div>
              </div>
            </div>
            {{-- INFO 2 --}}
            <div class="col-lg-4 col-4">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{ $pxM }}</h3>
                  <p>Pasien Pria</p>
                </div>
              </div>
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>{{ $bedRTC }}</h3>
                  <p>Ready to Clean</p>
                </div>
              </div>
            </div>
            {{-- INFO 3 --}}
            <div class="col-lg-4 col-4">
              <!-- small box -->
              <div class="small-box bg-pink">
                <div class="inner">
                  <h3>{{ $pxF }}</h3>
                  <p>Pasien Wanita</p>
                </div>
              </div>
              <!-- small box -->
              <div class="small-box bg-gray">
                <div class="inner">
                  <h3>{{ $bedRP }}</h3>
                  <p>Rencana Pulang</p>
                </div>
              </div>
            </div>
          </div>
          
          {{-- Start Card --}}
          <div class="card card-info card-outline">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">
                  <i class="fas fa-table"></i>
                  Tabel Waiting List/ Booking
                </h3>
              </div>
            </div>
            <div class="card-body">
              <table id="waitinglist" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="text-align: center">PASIEN</th>
                  <th style="text-align: center">TRANSAKSI</th>
                  <th width="5%" style="text-align: center">#</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pxBookings as $pxBooking)
                  @if ($pxBooking->bedTujuan->ruangan == 'AZALEA')
                    <tr>
                      <td>
                        {{$pxBooking->trxPasien->namapasien}}<br>
                        <b><i>{{$pxBooking->trxPasien->norekmed}}</i></b>
                      </td>
                      <td>
                        Asal: <i>
                        @if ($pxBooking->bed_asal==0)
                          <b>Booking Pendaftaran</b></i>
                        @else
                          <b>{{$pxBooking->bedAsal->namabed}} | {{$pxBooking->bedAsal->ruangan}} | {{$pxBooking->bedAsal->kelas}}</b></i>
                        @endif
                        <br>
                        Tujuan: <b>{{$pxBooking->bedTujuan->namabed}} | {{$pxBooking->bedTujuan->ruangan}} | {{$pxBooking->bedTujuan->kelas}}</b>
                      </td>
                      <td  width='89px' style="text-align: center"> 
                        <div class="btn-group">
                          <a href='#' class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='left' title='Approve pasien'><i class="fas fa-check"></i></a>
                          <a href='#' class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='left' title='Cancel pasien' onclick="return  confirm('Apakah anda yakin?')"><i class="fas fa-times-circle"></i></a>
                        </div>
                      </td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
            </div>
          </div>
          {{-- End Card --}}
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
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
  <script src="{{asset('adminlte')}}/dist/js/backtotop.js"></script>
  <script>
    $(function () {
      $("#waitinglist").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#tabeldokter_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection