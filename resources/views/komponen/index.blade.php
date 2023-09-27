@extends('layout.admin')

{{-- JUDUL HALAMAN ---------------------------------------------------------------------------------------------------------- --}}
@section('title','Master Komponen')

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
          <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">
                      <i class="fas fa-table"></i>
                      Komponen Barang
                    </h3>
                </div>
            </div>
            <div class="card-body">
              <div class="row">
                {{-- TIPE BARANG ---------------------------------------------------------------------------------------------------- --}}
                <div class="col-sm-4">
                  <div class="card card-info card-outline">
                      <div class="card-header">
                          <div class="d-flex justify-content-between align-items-center">
                              <h3 class="card-title">
                                <i class="fas fa-table"></i>
                                Tipe Barang
                              </h3>
                              <div>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tipebarang"> <i class="fas fa-upload"> </i> Tambah tipe barang</button>
                              </div>
                          </div>
                      </div>
                      <div class="card-body">
                        <table id="datatable1" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th width="15px">id</th>
                              <th>Tipe Barang</th>
                              <th>kode</th>
                              <th>status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1 ?>
                            @foreach ($tipebarangs as $tipebarang)
                              <tr>
                                <td>{{ $no }}</td>
                                <td>{{$tipebarang->tipebarang_nama}}</td>
                                <td>{{$tipebarang->tipebarang_kode}}</td>
                                <td>
                                  @if ($tipebarang->tipebarang_is_active==1)
                                    <h5><span class="badge badge-info">Active</span></h5>
                                  @else
                                    <h5><span class="badge badge-danger">Non Active</span></h5>
                                  @endif
                                </td>
                                <td width="10px"><div class="btn-group">
                                  <a href="" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit tipe barang: {{$tipebarang->tipebarang_nama}}"><i class="fas fa-edit"></i></a>
                                   @if ($tipebarang->tipebarang_is_active==1)
                                    <a href="" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Nonaktifkan tipe barang: {{$tipebarang->tipebarang_nama}}"><i class="fas fa-times-circle"></i></a>
                                    @else
                                    <a href="" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Aktifkan tipe barang: {{$tipebarang->tipebarang_nama}}"><i class="fas fa-check"></i></a>
                                  @endif
                                  <a href="" type="button" class="btn btn-danger" data-placement="bottom" title="Hapus tipe barang: {{$tipebarang->tipebarang_nama}}"><i class="fas fa-trash-alt"></i></a>
                                </div></td>
                              </tr>
                              <?php $no++ ?>
                            @endforeach
                          </tbody>
                          <tfoot>
                              <th>id</th>
                              <th>Tipe Barang</th>
                              <th>kode</th>
                              <th>status</th>
                              <th>Aksi</th>
                          </tfoot>
                        </table>
                      </div>
                  </div>
                </div>
                {{-- LOKASI BARANG -------------------------------------------------------------------------------------------------- --}}
                <div class="col-md-4">
                  <div class="card card-info card-outline">
                      <div class="card-header">
                          <div class="d-flex justify-content-between align-items-center">
                              <h3 class="card-title">
                                <i class="fas fa-table"></i>
                                Lokasi Barang
                              </h3>
                              <div>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#lokasibarang"> <i class="fas fa-upload"> </i> Tambah lokasi barang</button>
                              </div>
                          </div>
                      </div>
                      <div class="card-body">
                        <table id="datatable2" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th width="15px">id</th>
                              <th>Lokasi Barang</th>
                              <th>Keterangan</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1 ?>
                            @foreach ($lokasibarangs as $lokasibarang)
                              <tr>
                                <td>{{ $no }}</td>
                                <td>{{$lokasibarang->lokasibarang_nama}}</td>
                                <td>{{$lokasibarang->lokasibarang_keterangan}}</td>
                                <td>
                                  @if ($lokasibarang->lokasibarang_is_active==1)
                                    <h5><span class="badge badge-info">Active</span></h5>
                                  @else
                                    <h5><span class="badge badge-danger">Non Active</span></h5>
                                  @endif
                                </td>
                                <td width="10px"><div class="btn-group">
                                  <a href="" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit lokasi barang: {{$tipebarang->tipebarang_nama}}"><i class="fas fa-edit"></i></a>
                                  @if ($lokasibarang->lokasibarang_is_active==1)
                                    <a href="" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Nonaktifkan lokasi barang: {{$tipebarang->tipebarang_nama}}"><i class="fas fa-times-circle"></i></a>
                                    @else
                                      <a href="" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Nonaktifkan lokasi barang: {{$tipebarang->tipebarang_nama}}"><i class="fas fa-check"></i></a>
                                  @endif
                                  <a href="" type="button" class="btn btn-danger" data-placement="bottom" title="Hapus lokasi barang: {{$tipebarang->tipebarang_nama}}"><i class="fas fa-trash-alt"></i></a>
                                </div></td>
                              </tr>
                              <?php $no++ ?>
                            @endforeach
                          </tbody>
                          <tfoot>
                              <th>id</th>
                              <th>Lokasi Barang</th>
                              <th>Keterangan</th>
                              <th>Status</th>
                              <th>Aksi</th>
                          </tfoot>
                        </table>
                      </div>
                  </div>
                </div>
                {{-- SATUAN BARANG -------------------------------------------------------------------------------------------------- --}}
                <div class="col-md-4">
                  <div class="card card-info card-outline">
                      <div class="card-header">
                          <div class="d-flex justify-content-between align-items-center">
                              <h3 class="card-title">
                                <i class="fas fa-table"></i>
                                Satuan Barang
                              </h3>
                              <div>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#satuanbarang"> <i class="fas fa-upload"> </i> Tambah satuan barang</button>
                              </div>
                          </div>
                      </div>
                      <div class="card-body">
                        <table id="datatable3" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th width="15px">id</th>
                              <th>Satuan Barang</th>
                              <th>Keterangan</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1 ?>
                            @foreach ($satuanbarangs as $satuanbarang)
                              <tr>
                                <td>{{ $no }}</td>
                                <td>{{$satuanbarang->satuanbarang_nama}}</td>
                                <td>{{$satuanbarang->satuanbarang_keterangan}}</td>
                                <td>
                                  @if ($satuanbarang->satuanbarang_is_active==1)
                                    <h5><span class="badge badge-info">Active</span></h5>
                                  @else
                                    <h5><span class="badge badge-danger">Non Active</span></h5>
                                  @endif
                                </td>
                                <td width="10px"><div class="btn-group">
                                  <a href="" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit satuan barang: {{$satuanbarang->satuanbarang_nama}}"><i class="fas fa-edit"></i></a>
                                  @if ($satuanbarang->satuanbarang_is_active==1)
                                    <a href="" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Nonaktifkan satuan barang: {{$satuanbarang->satuanbarang_nama}}"><i class="fas fa-times-circle"></i></a>
                                    @else
                                      <a href="" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Nonaktifkan satuan barang: {{$satuanbarang->satuanbarang_nama}}"><i class="fas fa-check"></i></a>
                                  @endif
                                  <a href="" type="button" class="btn btn-danger" data-placement="bottom" title="Hapus satuan barang: {{$satuanbarang->satuanbarang_nama}}"><i class="fas fa-trash-alt"></i></a>
                                </div></td>
                              </tr>
                              <?php $no++ ?>
                            @endforeach
                          </tbody>
                          <tfoot>
                            <th>id</th>
                            <th>Satuan Barang</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tfoot>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">
                      <i class="fas fa-table"></i>
                      Lookup
                    </h3>
                </div>
            </div>
            <div class="card-body">
              <div class="row">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

{{-- MODAL ------------------------------------------------------------------------------------------------------------------ --}}
@section('modals')
  @include('modals.komponen')
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
      $("#datatable1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#datatable1_wrapper .col-md-6:eq(0)');
      $("#datatable2").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#datatable2_wrapper .col-md-6:eq(0)');
      $("#datatable3").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#datatable3_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection