@extends('layout.admin')

{{-- JUDUL HALAMAN ---------------------------------------------------------------------------------------------------------- --}}
@section('title','Edit Master Bed')

{{-- CSS -------------------------------------------------------------------------------------------------------------------- --}}
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                    Form Edit Master Bed <b>{{$bed->namabed}}</b>
                  </h3>
                  <div>
                    <a href="{{ route('bed.index') }}" class="btn btn-info btn-sm"> <i class="fas fa-arrow-left"> </i> Kembali</a>
                  </div>
              </div>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                        <label for="namabed">Nama Bed <a style="color:red">*</a></label>
                        <input required id="namabed" name="namabed" value="{{ $bed->namabed }}" type="text" class="form-control" placeholder="Nama bed pasien...">
                <div class="form-group">
                  <label for="kelas">Kelas Pelayanan <a style="color:red">*</a></label>
                  <select required id="kelas" name="kelas" class="form-control select2bs4" style="width: 100%;">
                    <option disabled selected="selected">-- Pilih salah satu --</option>
                      <option @if ($bed->kelas=='KELAS 3') selected="selected" @endif value="KELAS 3">KELAS 3</option>
                      <option @if ($bed->kelas=='KELAS 2') selected="selected" @endif value="KELAS 2">KELAS 2</option>
                      <option @if ($bed->kelas=='KELAS 1') selected="selected" @endif value="KELAS 1">KELAS 1</option>
                      <option @if ($bed->kelas=='UTAMA') selected="selected" @endif value="UTAMA">UTAMA</option>
                      <option @if ($bed->kelas=='VIP') selected="selected" @endif value="VIP">VIP</option>
                      <option @if ($bed->kelas=='VVIP') selected="selected" @endif value="VVIP">VVIP</option>
                      <option @if ($bed->kelas=='INTENSIF ANAK') selected="selected" @endif value="INTENSIF ANAK">INTENSIF ANAK</option>
                      <option @if ($bed->kelas=='INTENSIF DEWASA') selected="selected" @endif value="INTENSIF DEWASA">INTENSIF DEWASA</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ruangan">RUANGAN <a style="color:red">*</a></label>
                  <select required id="ruangan" name="ruangan" class="form-control select2bs4" style="width: 100%;">
                    <option disabled selected="selected">-- Pilih salah satu --</option>
                      <option @if ($bed->ruangan=='AZALEA') selected="selected" @endif value="AZALEA">AZALEA</option>
                      <option @if ($bed->ruangan=='AKASIA') selected="selected" @endif value="AKASIA">AKASIA</option>
                      <option @if ($bed->ruangan=='ASOKA') selected="selected" @endif value="ASOKA">ASOKA</option>
                      <option @if ($bed->ruangan=='ANTHURIUM') selected="selected" @endif value="ANTHURIUM">ANTHURIUM</option>
                      <option @if ($bed->ruangan=='PERINATOLOGI') selected="selected" @endif value="PERINATOLOGI">PERINATOLOGI</option>
                      <option @if ($bed->ruangan=='INTENSIF DEWASA') selected="selected" @endif value="INTENSIF DEWASA">INTENSIF DEWASA</option>
                  </select>
                </div>
              </form>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-right">
              <button type="submit" onclick="return  confirm('Apakah data tersebut sudah sesuai?')" class="btn btn-sm btn-primary">UPDATE MASTER BED <b>{{$bed->namabed}}</b></button>
              <button type="reset" class="btn btn-sm btn-danger">RESET</button>
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
  <!-- Select2 -->
  <script src="{{asset('adminlte')}}/plugins/select2/js/select2.full.min.js"></script>

  <script>
    $(function () {

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

    });
  </script>
@endsection