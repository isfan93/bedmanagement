@extends('layout.admin')

{{-- JUDUL HALAMAN ---------------------------------------------------------------------------------------------------------- --}}
@section('title','Master Dokter')

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
                  Informasi Dokter
                </h3>
                <div>
                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalCreate"> <i class="fas fa-upload"> </i> Tambah Dokter Baru</button>
                </div>

                {{-- modal --}}
                <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="modal">Tambah Data Dokter </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form action="{{ route('dokter.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="namadokter">Nama Dokter <a style="color:red">*</a></label>
                                <input required id="namadokter" name="namadokter" value="" type="text" class="form-control" placeholder="Nama Dokter...">
                              </div>
                              <div class="form-group">
                                <label for="spesialis">Spesialis <a style="color:red">*</a></label>
                                <input required id="spesialis" name="spesialis" value="" type="text" class="form-control" placeholder="Spesialis Dokter...">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class='btn btn-sm btn-primary'><i class="fa fa-floppy-disk"> </i> SIMPAN</button>
                            </div>
                          </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table id="tabeldokter" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="15px">no</th>
                    <th>Id Dokter</th>
                    <th>Nama Dokter</th>
                    <th>Spesialis</th>
                    <th>Detail</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1 ?>
                  @foreach ($dokters as $dokter)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{$dokter->id}}</td>
                      <td>{{$dokter->namadokter}}</td>
                      <td>{{$dokter->spesialis}}</td>
                      <td>
                        @if ($dokter->is_active==1)
                          <h5><span class="badge badge-info">Active</span></h5>
                        @else
                          <h5><span class="badge badge-danger">Non Active</span></h5>
                        @endif
                      </td>
                      <td width="10px"><div class="btn-group">
                        <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit dokter: {{$dokter->namadokter}}"><i class="fas fa-edit"></i></button>
                        @if ($dokter->is_active==1)
                          <a href="{{ route('dokter.nonaktif', $dokter->id) }}" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Nonaktifkan dokter: {{$dokter->namadokter}}"><i class="fas fa-times-circle"></i></a>
                          @else
                          <a href="{{ route('dokter.aktif', $dokter->id) }}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Aktifkan dokter: {{$dokter->namadokter}}"><i class="fas fa-check"></i></a>
                        @endif
                        <a href="" type="button" class="btn btn-danger" data-placement="bottom" title="Hapus dokter: {{$dokter->namadokter}}"><i class="fas fa-trash-alt"></i></a>
                      </div></td>
                    </tr>
                    <?php $no++ ?>
                  @endforeach
                </tbody>
                <tfoot>
                    <th width="15px">no</th>
                    <th>Id Dokter</th>
                    <th>Nama Dokter</th>
                    <th>Spesialis</th>
                    <th>Detail</th>
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