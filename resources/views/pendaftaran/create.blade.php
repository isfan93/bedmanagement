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
                      <select required id="bedbooking" name="bedbooking" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($beds as $bed)
                          <option value="{{ $bed->id }}">{{ $bed->ruangan }} {{ $bed->namabed }} | {{ $bed->kelas }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="namapasien">Nama lengkap pasien <a style="color:red">*</a></label>
                      <input required id="namapasien" name="namapasien" type="text" class="form-control" placeholder="Nama lengkap pasien...">
                    </div>
                    <div class="form-group">
                      <label for="norekmed">No rekmed pasien <a style="color:red">*</a></label>
                      <input required id="norekmed" name="norekmed" type="number" class="form-control" placeholder="No rekmed pasien...">
                    </div>
                    <div class="form-group">
                      <label for="tgllahir">Tanggal lahir pasien <a style="color:red">*</a></label>
                      <input required id="tgllahir" name="tgllahir" type="date" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="jeniskelamin">Jenis Kelamin<a style="color:red">*</a></label>
                      <select required id="jeniskelamin" name="jeniskelamin" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="alamatpasien">Alamat pasien <a style="color:red">*</a></label>
                      <textarea required id="alamatpasien" name="alamatpasien" type="text" class="form-control" placeholder="Alamat pasien..." rows="2"></textarea>
                    </div>
                </div>
                {{-- ROW 2 ---------------------------------------------------------------------------------------------------------- --}}
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="dpjp1">DPJP 1 <a style="color:red">*</a></label>
                      <select required id="dpjp1" name="dpjp1" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($dokters as $dokter)
                          <option value="{{ $dokter->id }}">{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="dpjp2">DPJP 2</label>
                      <select id="dpjp2" name="dpjp2" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($dokters as $dokter)
                          <option value="{{ $dokter->id }}">{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="dpjp3">DPJP 3</label>
                      <select id="dpjp3" name="dpjp3" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($dokters as $dokter)
                          <option value="{{ $dokter->id }}">{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="dpjp4">DPJP 4</label>
                      <select id="dpjp4" name="dpjp4" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($dokters as $dokter)
                          <option value="{{ $dokter->id }}">{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="dpjp5">DPJP 5</label>
                      <select id="dpjp5" name="dpjp5" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($dokters as $dokter)
                          <option value="{{ $dokter->id }}">{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="dpjp6">DPJP 6</label>
                      <select id="dpjp6" name="dpjp6" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($dokters as $dokter)
                          <option value="{{ $dokter->id }}">{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="diagnosa">Diagnosa awal <a style="color:red">*</a></label>
                      <input required id="diagnosa" name="diagnosa" type="text" class="form-control" placeholder="Diagnosa awal...">
                    </div>
                </div>
                {{-- ROW 3 ---------------------------------------------------------------------------------------------------------- --}}
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="penjamin">Penjamin <a style="color:red">*</a></label>
                      <select required id="penjamin" name="penjamin" class="form-control select2bs4" style="width: 100%;">
                        <option disabled selected="selected">-- Pilih salah satu --</option>
                        @foreach ($penjamins as $penjamin)
                          <option value="{{ $penjamin->id }}">{{ $penjamin->namapenjamin }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan pasien</label>
                      <textarea id="keterangan" name="keterangan" type="text" class="form-control" placeholder="Keterangan..." rows="4"></textarea>
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
@endsection