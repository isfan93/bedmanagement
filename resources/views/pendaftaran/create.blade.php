@extends('layout.admin')

{{-- JUDUL HALAMAN ---------------------------------------------------------------------------------------------------------- --}}
@section('title','Tambah pasien booking')

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
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('pendaftaran') }}">Pendaftaran</a></li>
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
                      Form tambah pasien booking
                    </h3>
                    <div>
                      <a href="{{ url('pendaftaran')}}" class="btn btn-info btn-sm"> <i class="fas fa-arrow-left"> </i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="row">
                {{-- ROW 1 ---------------------------------------------------------------------------------------------------------- --}}
                <div class="col-sm-4">
                  <form action="{{url('pendaftaran')}}" method="POST">
                  @csrf
                    <div class="form-group">
                      <label for="bedbooking">Bed Booking <a style="color:red">*</a></label>
                      <select id="bedbooking" name="bedbooking" class="form-control select2bs4" style="width: 100%;" required>
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($beds as $bed)
                          <option value="{{ $bed->id }}" {{ old('bedbooking') == $bed->id ? 'selected' : '' }}>{{ $bed->ruangan }} {{ $bed->namabed }} | {{ $bed->kelas }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="namapasien">Nama lengkap pasien <a style="color:red">*</a></label>
                      <input required id="namapasien" name="namapasien" type="text" class="form-control" placeholder="Nama lengkap pasien..." value="{{old('namapasien')}}">
                    </div>
                    <div class="form-group">
                      <label for="norekmed">No rekmed pasien <a style="color:red">*</a></label>
                      <input required id="norekmed" name="norekmed" type="number" class="form-control" placeholder="No rekmed pasien..." value="{{old('norekmed')}}">
                    </div>
                    <div class="form-group">
                      <label for="tgllahir">Tanggal lahir pasien <a style="color:red">*</a></label>
                      <input required id="tgllahir" name="tgllahir" type="date" class="form-control" value="{{old('tgllahir')}}>
                    </div>
                    <div class="form-group">
                      <label for="jeniskelamin">Jenis Kelamin<a style="color:red">*</a></label>
                      <select id="jeniskelamin" name="jeniskelamin" class="form-control select2bs4" style="width: 100%;" required>
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        <option value="pria" {{ old('jeniskelamin') == 'pria' ? 'selected' : '' }}>Pria</option>
                        <option value="wanita" {{ old('jeniskelamin') == 'wanita' ? 'selected' : '' }}>Wanita</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="alamatpasien">Alamat pasien <a style="color:red">*</a></label>
                      <textarea required id="alamatpasien" name="alamatpasien" type="text" class="form-control" placeholder="Alamat pasien..." rows="2">{{old('alamatpasien')}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="agama">Agama <a style="color:red">*</a></label>
                      <select id="agama" name="agama" class="form-control select2bs4" style="width: 100%;" required>
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                          <option value="Islam" {{ old('Islam') }}>Islam</option>
                          <option value="Kristen Katolik" {{ old('Kristen Katolik') }}>Kristen Katolik</option>
                          <option value="Kristen Protestan" {{ old('Kristen Protestan') }}>Kristen Protestan</option>
                          <option value="Hindu" {{ old('Hindu') }}>Hindu</option>
                          <option value="Budha" {{ old('Budha') }}>Budha</option>
                          <option value="Konghucu" {{ old('Konghucu') }}>Konghucu</option>
                      </select>
                    </div>
                </div>
                {{-- ROW 2 ---------------------------------------------------------------------------------------------------------- --}}
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="dpjp1">DPJP 1 <a style="color:red">*</a></label>
                      <select id="dpjp1" name="dpjp1" class="form-control select2bs4" style="width: 100%;" required>
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($dokters as $dokter)
                          <option value="{{ $dokter->id }}" {{ old('dpjp1') == $dokter->id ? 'selected' : '' }}>{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="dpjp2">DPJP 2</label>
                      <select id="dpjp2" name="dpjp2" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($dokters as $dokter)
                          <option value="{{ $dokter->id }}" {{ old('dpjp2') == $dokter->id ? 'selected' : '' }}>{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="dpjp3">DPJP 3</label>
                      <select id="dpjp3" name="dpjp3" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($dokters as $dokter)
                          <option value="{{ $dokter->id }}" {{ old('dpjp3') == $dokter->id ? 'selected' : '' }}>{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="dpjp4">DPJP 4</label>
                      <select id="dpjp4" name="dpjp4" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($dokters as $dokter)
                          <option value="{{ $dokter->id }}" {{ old('dpjp4') == $dokter->id ? 'selected' : '' }}>{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="dpjp5">DPJP 5</label>
                      <select id="dpjp5" name="dpjp5" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($dokters as $dokter)
                          <option value="{{ $dokter->id }}" {{ old('dpjp5') == $dokter->id ? 'selected' : '' }}>{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="dpjp6">DPJP 6</label>
                      <select id="dpjp6" name="dpjp6" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($dokters as $dokter)
                          <option value="{{ $dokter->id }}" {{ old('dpjp6') == $dokter->id ? 'selected' : '' }}>{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  {{-- ROW 3 ---------------------------------------------------------------------------------------------------------- --}}
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="diagnosa">Diagnosa awal <a style="color:red">*</a></label>
                      <input required id="diagnosa" name="diagnosa" type="text" class="form-control" placeholder="Diagnosa awal..." value="{{old('diagnosa')}}">
                    </div>
                    <div class="form-group">
                      <label for="penjamin">Penjamin <a style="color:red">*</a></label>
                      <select id="penjamin" name="penjamin" class="form-control select2bs4" style="width: 100%;" required>
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($penjamins as $penjamin)
                          <option value="{{ $penjamin->id }}" {{ old('penjamin') == $penjamin->id ? 'selected' : '' }}>{{ $penjamin->namapenjamin }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan pasien</label>
                      <textarea id="keterangan" name="keterangan" type="text" class="form-control" placeholder="Keterangan..." rows="4">{{old('keterangan')}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="asalpasien">Asal Pasien <a style="color:red">*</a></label>
                      <select id="asalpasien" name="asalpasien" class="form-control select2bs4" style="width: 100%;" required>
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        <option  value="IGD" {{ old('asalpasien') == 'IGD' ? 'selected' : '' }}>IGD</option>
                        <option  value="PONEK/VK" {{ old('asalpasien') == 'PONEK/VK' ? 'selected' : '' }}>PONEK/VK</option>
                        <option  value="POLIKLINIK" {{ old('asalpasien') == 'POLIKLINIK' ? 'selected' : '' }}>POLIKLINIK</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <button type="submit" onclick="return  confirm('Apakah data tersebut sudah sesuai?')" class="btn btn-sm btn-primary">SIMPAN</button>
                  <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
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

  {{-- Menampilkan Message menggunakan library Toastr --}}
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
  </script>
  @if ($errors->any())
    <script>
      $(document).ready(function() {
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}', 'Kesalahan!',{timeOut:30000});
        @endforeach
      });
      // toastr.error("{{Session::get('error')}}","Error!",{timeOut:10000});
    </script>
  @endif
@endsection