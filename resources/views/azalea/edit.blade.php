@extends('layout.admin')

{{-- JUDUL HALAMAN ---------------------------------------------------------------------------------------------------------- --}}
@section('title','Edit data pasien bed '. $trxPasien->Bed->namabed)

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
            <li class="breadcrumb-item"><a href="{{ url('azalea') }}">azalea</a></li>
            <li class="breadcrumb-item active">@yield('title') </li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content text-sm">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="card-title">
                    
                  </h3>
                  <div>
                    <a href="{{ url('azalea')}}" class="btn btn-info btn-sm"> <i class="fas fa-arrow-left"> </i> Kembali</a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-info card-outline">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">
                      <i class="fas fa-table"></i>
                      FORM EDIT DATA PASIEN
                    </h3>
                </div>
            </div>
            <form action="{{ route('azalea.updateDatapasien', $trxPasien->trx_id) }}" method="post">
              <div class="card-body">
                <div class="row">
                  {{-- ROW 1 ---------------------------------------------------------------------------------------------------------- --}}
                  <div class="col-sm-6">
                    @csrf
                      <input value="{{$trxPasien->trx_id}}" id="id" name="id" type="hidden" class="form-control">
                      <div class="form-group">
                        <label for="namapasien">Nama lengkap pasien <a style="color:red">*</a></label>
                        <input required id="namapasien" name="namapasien" value="{{ $trxPasien->namapasien }}" type="text" class="form-control" placeholder="Nama lengkap pasien...">
                      </div>
                      <div class="form-group">
                        <label for="norekmed">No rekmed pasien <a style="color:red">*</a></label>
                        <input required id="norekmed" name="norekmed" type="number" value="{{ $trxPasien->norekmed }}" class="form-control" placeholder="No rekmed pasien...">
                      </div>
                      <div class="form-group">
                        <label for="tgllahir">Tanggal lahir pasien <a style="color:red">*</a></label>
                        <input required id="tgllahir" name="tgllahir" type="date" value="{{ $trxPasien->tgllahir }}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="jeniskelamin">Jenis Kelamin <a style="color:red">*</a></label>
                        <select required id="jeniskelamin" name="jeniskelamin" class="form-control select2bs4" style="width: 100%;">
                          <option disabled selected="selected">-- Pilih salah satu --</option>
                            <option @if ($trxPasien->jeniskelamin=='pria')
                                selected="selected"
                            @endif value="pria">Pria</option>
                            <option @if ($trxPasien->jeniskelamin=='wanita')
                                selected="selected"
                            @endif value="wanita">Wanita</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat pasien <a style="color:red">*</a></label>
                        <textarea required id="alamat" name="alamat" type="text" class="form-control" placeholder="Alamat pasien..." rows="2">{{ $trxPasien->alamatpasien }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="penjamin">Penjamin <a style="color:red">*</a></label>
                        <select required id="penjamin" name="penjamin" class="form-control select2bs4" style="width: 100%;">
                          <option disabled selected="selected">-- Pilih salah satu --</option>
                          @foreach ($penjamins as $penjamin)
                            <option @if ($trxPasien->penjamin==$penjamin->id)
                                selected="selected"
                            @endif value="{{ $penjamin->id }}">{{ $penjamin->namapenjamin }}</option>
                          @endforeach
                        </select>
                      </div>
                      {{-- Update input pasang dan ganti infus --}}
                      <div class="form-group">
                        <div class="row">
                          <div class="col-6">
                            <label for="">Pasang Infus <a style="color:red">*</a></label>
                            <input required id="infus_pasang" name="infus_pasang" type="datetime-local" value="{{ $trxPasien->infus_pasang }}" class="form-control" placeholder="">
                          </div>
                          <div class="col-6">
                            <label for="">Ganti Infus <a style="color:red">*</a></label>
                            <input required id="infus_ganti" name="infus_ganti" type="datetime-local" value="{{ $trxPasien->infus_ganti }}" class="form-control" placeholder="">
                          </div>
                        </div>
                      </div>
                      {{-- Update input pasang dan ganti infus --}}
                      <div class="form-group">
                        <label for="keterangan">Keterangan Pasien</label>
                        <textarea id="keterangan" name="keterangan" type="text" class="form-control" placeholder="Keterangan..." rows="3">{{ $trxPasien->keterangan }}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <button type="submit" onclick="return  confirm('Apakah data tersebut sudah sesuai?')" class="btn btn-sm btn-primary">UPDATE DATA PASIEN</button>
                    <button type="reset" class="btn btn-sm btn-danger">RESET</button>
                  </div>
                </div>
              </div>
            </form>
        </div>
        <div class="col-md-5">
          <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">
                      <i class="fas fa-table"></i>
                      FORM EDIT DATA MEDIS PASIEN
                    </h3>
                </div>
            </div>
            <div class="card-body">
              <form action="{{ route('azalea.updateDataMedisPasien', $trxPasien->trx_id) }}" method="post">
                @csrf
              {{-- ROW 2 ---------------------------------------------------------------------------------------------------------- --}}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="dpjp1">DPJP 1 <a style="color:red">*</a></label>
                    <select required id="dpjp1" name="dpjp1" class="form-control select2bs4" style="width: 100%;">
                      <option disabled selected="selected">-- Pilih salah satu --</option>
                      @foreach ($dokters as $dokter)
                        <option @if ($trxPasien->dpjp1==$dokter->id)
                            selected="selected"
                        @endif value="{{ $dokter->id }}">{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="dpjp2">DPJP 2</label>
                    <select id="dpjp2" name="dpjp2" class="form-control select2bs4" style="width: 100%;">
                      <option value="" selected="selected">-- Pilih salah satu --</option>
                      @foreach ($dokters as $dokter)
                        <option @if ($trxPasien->dpjp2==$dokter->id)
                            selected="selected"
                        @endif value="{{ $dokter->id }}">{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="dpjp3">DPJP 3</label>
                    <select id="dpjp3" name="dpjp3" class="form-control select2bs4" style="width: 100%;">
                      <option value="" selected="selected">-- Pilih salah satu --</option>
                      @foreach ($dokters as $dokter)
                        <option @if ($trxPasien->dpjp3==$dokter->id)
                            selected="selected"
                        @endif value="{{ $dokter->id }}">{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="dpjp4">DPJP 4</label>
                    <select id="dpjp4" name="dpjp4" class="form-control select2bs4" style="width: 100%;">
                      <option value="" selected="selected">-- Pilih salah satu --</option>
                      @foreach ($dokters as $dokter)
                        <option @if ($trxPasien->dpjp4==$dokter->id)
                            selected="selected"
                        @endif value="{{ $dokter->id }}">{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="dpjp5">DPJP 5</label>
                    <select id="dpjp5" name="dpjp5" class="form-control select2bs4" style="width: 100%;">
                      <option value="" selected="selected">-- Pilih salah satu --</option>
                      @foreach ($dokters as $dokter)
                        <option @if ($trxPasien->dpjp5==$dokter->id)
                            selected="selected"
                        @endif value="{{ $dokter->id }}">{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="dpjp6">DPJP 6</label>
                    <select id="dpjp6" name="dpjp6" class="form-control select2bs4" style="width: 100%;">
                      <option value="" selected="selected">-- Pilih salah satu --</option>
                      @foreach ($dokters as $dokter)
                        <option @if ($trxPasien->dpjp6==$dokter->id)
                            selected="selected"
                        @endif value="{{ $dokter->id }}">{{ $dokter->namadokter }} | Spesialis {{ $dokter->spesialis }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="diagnosa">Diagnosa <a style="color:red">*</a></label>
                    <textarea id="diagnosa" name="diagnosa" type="text" class="form-control" placeholder="Diagnosa..." rows="4">{{ $trxPasien->diagnosa }}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <button type="submit" onclick="return  confirm('Apakah data tersebut sudah sesuai?')" class="btn btn-sm btn-primary">UPDATE DATA MEDIS PASIEN</button>
                <button type="reset" class="btn btn-sm btn-danger">RESET</button>
              </form>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card card-danger card-outline">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">
                      <i class="fas fa-table"></i>
                      FORM EDIT PPJA
                    </h3>
                </div>
            </div>
            <div class="card-body">
              <form action="{{ route('azalea.updatePpjaPasien', $trxPasien->trx_id) }}" method="post">
                @csrf
              <div class="form-group">
                <label for="ppja">PPJA Pasien <a style="color:red">*</a></label>
                <select required id="ppja" name="ppja" class="form-control select2bs4" style="width: 100%;">
                  <option disabled selected="selected">-- Pilih salah satu --</option>
                  @foreach ($ppjas as $ppja)
                    <option @if ($ppja->id==$trxPasien->ppja)
                        selected="selected"
                    @endif value="{{ $ppja->id }}">{{ $ppja->namaperawat }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <button type="submit" onclick="return  confirm('Apakah data tersebut sudah sesuai?')" class="btn btn-sm btn-primary">UPDATE PPJA PASIEN</button>
                <button type="reset" class="btn btn-sm btn-danger">RESET</button>
              </form>
              </div>
            </div>
          </div>
          <div class="card card-danger card-outline">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">
                      <i class="fas fa-table"></i>
                      WAKTU HABIS CAIRAN INFUS
                    </h3>
                </div>
            </div>
            <div class="card-body">
              <form action="{{route('azalea.hci',$trxPasien->trx_id)}}" method="post">
              @csrf
              @method('put')
              <div class="row">
                <div class="col-sm-9">
                  <div class="form-group">
                    <label for="jenis">Jenis <a style="color:red">*</a></label>
                        <select required id="jenis" name="jenis" class="form-control select2bs4" style="width: 100%;">
                          <option disabled selected="selected">-- Pilih salah satu --</option>
                          <option @if ($trxPasien->tci_jenis == 'makro')
                                    selected="selected"
                                  @endif value="makro">MAKRO (Dewasa)</option>
                          <option @if ($trxPasien->tci_jenis == 'mikro')
                                    selected="selected"
                                  @endif value="mikro">MIKRO (Anak)</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="faktortetes">Faktor Tetes</label>
                        <input readonly id="faktortetes" name="faktortetes" type="number" value="{{ $trxPasien->tci_faktortetes}}" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jmlcairan">Jumlah Cairan (ml) <a style="color:red">*</a></label>
                    <input required id="jmlcairan" name="jmlcairan" type="number" value="{{$trxPasien->tci_jmlcairan}}" class="form-control" placeholder="Silahkan isi...">
                  </div>
                  <div class="form-group">
                    <label for="waktuinfus">Waktu Penggantian Cairan Infus <a style="color:red">*</a></label>
                    <input required id="waktuinfus" name="waktuinfus" type="datetime-local" value="{{$tciwaktupenggantiancairan}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="jumlahtetes">Jumlah Tetes /Menit <a style="color:red">*</a></label>
                    <input required id="jumlahtetes" name="jumlahtetes" type="number" value="{{ $trxPasien->tci_tpm}}" class="form-control" placeholder="Silahkan isi...">
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-6">
                      <a href="{{route('azalea.hciClear',$trxPasien->trx_id)}}" onclick="return  confirm('Apakah anda yakin? karena data sebelumnya tidak bisa dikembalikan.')" class="btn btn-sm btn-warning {{ $trxPasien->tci_jenis == null ? 'disabled' : ''}}">STOP WAKTU INFUS</a>
                    </div>
                    <div class="col-sm-6">
                      <div class="text-right">
                        <button type="submit" onclick="return  confirm('Apakah data tersebut sudah sesuai?')" class="btn btn-sm btn-primary">SIMPAN DATA</button>
                        <button type="reset" class="btn btn-sm btn-danger">RESET</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
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

    $(document).ready(function() {
      $('#jenis').on('change',function() {
        var jenis = $(this).val();
        // console.log(jenis);
        if (jenis=='makro') {
          $('#faktortetes').val('20')
        }else if(jenis=='mikro') {
          $('#faktortetes').val('60')
        }
      })
    });

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