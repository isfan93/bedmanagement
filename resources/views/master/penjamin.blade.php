@extends('layout.admin')

{{-- JUDUL HALAMAN ---------------------------------------------------------------------------------------------------------- --}}
@section('title','Master Penjamin')

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
                    Informasi Penjamin
                  </h3>
                  <div>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tipebarang"> <i class="fas fa-upload"> </i> Tambah Penjamin Baru</button>
                  </div>
              </div>
            </div>
            <div class="card-body">
              <table id="tabeldokter" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="15px">no</th>
                    <th>Id Penjamin</th>
                    <th>Nama Penjamin</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1 ?>
                  @foreach ($penjamins as $penjamin)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{$penjamin->id}}</td>
                      <td>{{$penjamin->namapenjamin}}</td>
                      <td>{{$penjamin->keterangan}}</td>
                      <td>
                        @if ($penjamin->is_active==1)
                          <h5><span class="badge badge-info">Active</span></h5>
                        @else
                          <h5><span class="badge badge-danger">Non Active</span></h5>
                        @endif
                      </td>
                      <td width="10px"><div class="btn-group">
                        <a href="" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit penjamin: {{$penjamin->namapenjamin}}"><i class="fas fa-edit"></i></a>
                        @if ($penjamin->is_active==1)
                          <a href="" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Nonaktifkan penjamin: {{$penjamin->namapenjamin}}"><i class="fas fa-times-circle"></i></a>
                          @else
                          <a href="" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Aktifkan penjamin: {{$penjamin->namapenjamin}}"><i class="fas fa-check"></i></a>
                        @endif
                        <a href="" type="button" class="btn btn-danger" data-placement="bottom" title="Hapus penjamin: {{$penjamin->namapenjamin}}"><i class="fas fa-trash-alt"></i></a>
                      </div></td>
                    </tr>
                    <?php $no++ ?>
                  @endforeach
                </tbody>
                <tfoot>
                    <th width="15px">no</th>
                    <th>Id Penjamin</th>
                    <th>Nama Penjamin</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>#</th>
                </tfoot>
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
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#tabeldokter_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection