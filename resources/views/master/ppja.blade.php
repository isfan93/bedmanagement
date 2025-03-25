@extends('layout.admin')

{{-- JUDUL HALAMAN ---------------------------------------------------------------------------------------------------------- --}}
@section('title','Master PPJA')

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
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#Modal-create"> <i class="fas fa-upload"> </i> Tambah Perawat Baru</button>

                    {{-- modal --}}
                    <div class="modal fade" id="Modal-create" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modal">EDIT DATA PERAWAT</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <form action="{{ route('ppja.tambahperawat') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="namaperawat">NAMA LENGKAP<a style="color:red">*</a></label>
                                    <input required id="namaperawat" name="namaperawat" value="" type="text" class="form-control" placeholder="Nama Perawat...">
                                  </div>
                                  <div class="form-group">
                                    <label for="unit">LOKASI DINAS <a style="color:red">*</a></label>
                                    <select required id="unit" name="unit" class="form-control select2bs4" style="width: 100%;">
                                      <option disabled selected="selected">-- Pilih salah satu --</option>
                                      <option value="AZALEA">AZALEA</option>
                                      <option value="AKASIA">AKASIA</option>
                                      <option value="ASOKA">ASOKA</option>
                                      <option value="ANTHURIUM">ANTHURIUM</option>
                                      <option value="PERINATOLOGI">PERINATOLOGI</option>
                                      <option value="INTENSIF DEWASA">INTENSIF DEWASA</option>
                                      <option value="IGD">IGD</option>
                                      <option value="POLIKLINIK">POLIKLINIK</option>
                                      <option value="ALYSSUM">ALYSSUM</option>
                                      <option value="ALAMANDA">ALAMANDA</option>
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
            </div>
            <div class="card-body">
              <table id="tabeldokter" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="15px">no</th>
                    {{-- <th>Id PPJA</th> --}}
                    <th>Nama PPJA</th>
                    <th>Unit</th>
                    <th>Status</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1 ?>
                  @foreach ($ppjas as $perawat)
                    <tr>
                      <td>{{ $no }}</td>
                      {{-- <td>{{$perawat->id}}</td> --}}
                      <td>{{$perawat->namaperawat}}</td>
                      <td>{{$perawat->unit}}</td>
                      <td>
                        @if ($perawat->is_active==1)
                          <h5><span class="badge badge-info">Active</span></h5>
                        @else
                          <h5><span class="badge badge-danger">Non Active</span></h5>
                        @endif
                      </td>
                      <td width="10px"><div class="btn-group">
                        <button class="btn btn-success" data-toggle="modal" data-target="#Modal-{{$perawat->id}}" data-toggle="tooltip"  data-placement="bottom" title="Edit perawat: {{$perawat->namaperawat}}"><i class="fas fa-edit"></i></button>
                        @if ($perawat->is_active==1)
                          <a href="{{ route('ppja.nonaktif',$perawat->id) }}" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Nonaktifkan perawat: {{$perawat->namaperawat}}"><i class="fas fa-times-circle"></i></a>
                          @else
                          <a href="{{ route('ppja.aktif',$perawat->id) }}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Aktifkan perawat: {{$perawat->namaperawat}}"><i class="fas fa-check"></i></a>
                        @endif
                        <a href="" type="button" class="btn btn-danger" data-placement="bottom" title="Hapus perawat: {{$perawat->namaperawat}}"><i class="fas fa-trash-alt"></i></a>
                      </div></td>
                    </tr>
                    <?php $no++ ?>

                    {{-- modal --}}
                    <div class="modal fade" id="Modal-{{$perawat->id}}" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modal">EDIT DATA PERAWAT</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <form action="{{ route('ppja.update',$perawat->id) }}" method="post">
                                @csrf
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="namaperawat">NAMA LENGKAP<a style="color:red">*</a></label>
                                    <input required id="namaperawat" name="namaperawat" value="{{$perawat->namaperawat}}" type="text" class="form-control" placeholder="Nama Perawat...">
                                  </div>
                                  <div class="form-group">
                                    <label for="unit">LOKASI DINAS <a style="color:red">*</a></label>
                                    <select required id="unit" name="unit" class="form-control select2bs4" style="width: 100%;">
                                      <option disabled selected="selected">-- Pilih salah satu --</option>
                                      <option @if($perawat->unit == 'AZALEA') selected @endif value="AZALEA">AZALEA</option>
                                      <option @if($perawat->unit == 'AKASIA') selected @endif value="AKASIA">AKASIA</option>
                                      <option @if($perawat->unit == 'ASOKA') selected @endif value="ASOKA">ASOKA</option>
                                      <option @if($perawat->unit == 'ANTHURIUM') selected @endif value="ANTHURIUM">ANTHURIUM</option>
                                      <option @if($perawat->unit == 'PERINATOLOGI') selected @endif value="PERINATOLOGI">PERINATOLOGI</option>
                                      <option @if($perawat->unit == 'INTENSIF DEWASA') selected @endif value="INTENSIF DEWASA">INTENSIF DEWASA</option>
                                      <option @if($perawat->unit == 'IGD') selected @endif value="IGD">IGD</option>
                                      <option @if($perawat->unit == 'POLIKLINIK') selected @endif value="POLIKLINIK">POLIKLINIK</option>
                                      <option @if($perawat->unit == 'ALYSSUM') selected @endif value="ALYSSUM">ALYSSUM</option>
                                      <option @if($perawat->unit == 'ALAMANDA') selected @endif value="ALAMANDA">ALAMANDA</option>
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
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#tabeldokter_wrapper .col-md-6:eq(0)');
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