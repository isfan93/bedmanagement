@extends('layout.admin')

{{-- JUDUL HALAMAN ---------------------------------------------------------------------------------------------------------- --}}
@section('title','Master Bed')

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
                    Informasi Bed
                  </h3>
                  <div>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalCreate" data-toggle='tooltip' data-placement='left' title='Tambah master bed baru'> <i class="fas fa-upload"> </i> Tambah Bed Baru</button>
                  </div>

                  {{-- modal --}}
                  <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal">Tambah Master Bed </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('bed.store') }}" method="post">
                              @csrf
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="namabed">Nama Bed <a style="color:red">*</a></label>
                                  <input required id="namabed" name="namabed" value="" type="text" class="form-control" placeholder="Nama bed pasien...">
                                </div>
                                <div class="form-group">
                                  <label for="kelas">Kelas Pelayanan <a style="color:red">*</a></label>
                                  <select required id="kelas" name="kelas" class="form-control select2bs4" style="width: 100%;">
                                    <option disabled selected="selected">-- Pilih salah satu --</option>
                                      <option value="KELAS 3">KELAS 3</option>
                                      <option value="KELAS 2">KELAS 2</option>
                                      <option value="KELAS 1">KELAS 1</option>
                                      <option value="UTAMA">UTAMA</option>
                                      <option value="VIP">VIP</option>
                                      <option value="VVIP">VVIP</option>
                                      <option value="INTENSIF ANAK">INTENSIF ANAK</option>
                                      <option value="INTENSIF DEWASA">INTENSIF DEWASA</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="ruangan">RUANGAN <a style="color:red">*</a></label>
                                  <select required id="ruangan" name="ruangan" class="form-control select2bs4" style="width: 100%;">
                                    <option disabled selected="selected">-- Pilih salah satu --</option>
                                      <option value="AZALEA">AZALEA</option>
                                      <option value="AKASIA">AKASIA</option>
                                      <option value="ASOKA">ASOKA</option>
                                      <option value="ANTHURIUM">ANTHURIUM</option>
                                      <option value="PERINATOLOGI">PERINATOLOGI</option>
                                      <option value="INTENSIF DEWASA">INTENSIF DEWASA</option>
                                  </select>
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
                    <th>Nama Bed</th>
                    <th>Ruangan</th>
                    <th>Status</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1 ?>
                  @foreach ($beds as $bed)
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$bed->namabed}}</td>
                      <td>{{$bed->ruangan}}</td>
                      <td>
                        @if ($bed->is_active==1)
                          <h5><span class="badge badge-info">Active</span></h5>
                        @else
                          <h5><span class="badge badge-danger">Non Active</span></h5>
                        @endif
                      </td>
                      <td width="10px"><div class="btn-group">
                        <a href="{{ route('bed.edit',$bed->id) }}" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit bed: {{$bed->namabed}}"><i class="fas fa-edit"></i></a>
                        @if ($bed->is_active==1)
                          <a href="{{ route('bed.Nonaktif',$bed->id) }}" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Nonaktifkan bed: {{$bed->namabed}}"><i class="fas fa-times-circle"></i></a>
                          @else
                          <a href="{{ route('bed.Aktif',$bed->id) }}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Aktifkan bed: {{$bed->namabed}}"><i class="fas fa-check"></i></a>
                        @endif
                        <a href="{{ route('bed.Delete',$bed->id) }}" type="button" class="btn btn-danger" data-placement="bottom" title="Hapus bed: {{$bed->namabed}}"><i class="fas fa-trash-alt"></i></a>
                      </div></td>
                    </tr>
                    <?php $no++ ?>
                  @endforeach
                </tbody>
                <tfoot>
                    <th width="15px">no</th>
                    <th>Nama Bed</th>
                    <th>Ruangan</th>
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

<script>
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "15000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
    }
    $('.toastrDefaultError').click(function() {
        toastr.error('Belum berfungsi yaa. Sabar masih proses develop..')
      });
  </script>

  @if (Session::has('success'))
    <script>
      toastr.success("{{Session::get('success')}}","Success!");
      // toastr.info("{{Session::get('success')}}","Success!");
      // toastr.warning("{{Session::get('success')}}","Success!");
      // toastr.error("{{Session::get('success')}}","Success!");
    </script>
  @endif
@endsection