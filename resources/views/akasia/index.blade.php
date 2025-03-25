@extends('layout.admin')

{{-- JUDUL HALAMAN ---------------------------------------------------------------------------------------------------------- --}}
@section('title','Akasia')

{{-- CSS -------------------------------------------------------------------------------------------------------------------- --}}
@section('css')
  {{-- auto refresh --}}
  <meta http-equiv="refresh" content="60">
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection

{{-- KONTEN ----------------------------------------------------------------------------------------------------------------- --}}
@section('konten')
  <div class="progress" style="height: 4px;">
    <div id="timerprogress" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
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
  </section>

  <section class="content text-sm">
    <div class="container-fluid">
      <div class="row">
  {{-- INFO 1 --}}
  <div class="col-lg-2 col-2">
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $pxTotal }}</h3>
        <p>Seluruh Pasien</p>
      </div>
    </div>
  </div>
  <div class="col-lg-2 col-2">
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $bedKosong }}</h3>
        <p>Bed Kosong</p>
      </div>
    </div>
  </div>
  {{-- INFO 2 --}}
  <div class="col-lg-2 col-2">
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ $pxM }}</h3>
        <p>Pasien Pria</p>
      </div>
    </div>
  </div>
  <div class="col-lg-2 col-2">
    <div class="small-box bg-purple">
      <div class="inner">
        <h3>{{ $bedRTC }}</h3>
        <p>Ready to Clean</p>
      </div>
    </div>
  </div>
  <div class="col-lg-2 col-2">
    <div class="small-box bg-pink">
      <div class="inner">
        <h3>{{ $pxF }}</h3>
        <p>Pasien Wanita</p>
      </div>
    </div>
  </div>
  <div class="col-lg-2 col-2">
    <div class="small-box bg-gray">
      <div class="inner">
        <h3>{{ $bedRP }}</h3>
        <p>Rencana Pulang</p>
      </div>
    </div>
  </div>
</div>
      <div class="row">
        <div class="col-sm-9 col-9">
          @include('akasia.kelas2')
        </div>
        <div class="col-sm-3 col-3">
          @include('akasia.info')
        </div>
      </div>
  </section>
  @endsection


{{-- JS --------------------------------------------------------------------------------------------------------------------- --}}
@section('js')
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
  <script src="{{asset('adminlte')}}/plugins/select2/js/select2.full.min.js"></script>
  
  {{$jml = $tcis->count()}}
  @if ($tcis->count() != 0)
    <audio autoplay>
      <source src="{{ asset('adminlte/src/notif.mp3') }}"  type="audio/mp3">
      Your browser does not support the audio element.
    </audio>
  @endif

  <script>
    $(function () {
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

    });

    $(function () {
      $("#waitinglist").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#tabeldokter_wrapper .col-md-6:eq(0)');
      $("#hci").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#tabeldokter_wrapper .col-md-6:eq(0)');
    });
  </script>

  <script>
    function startTimer(seconds) {
        const timer = document.getElementById('timerprogress');
        timer.style.width = '0%';
        let currentTime = 0;
        
        const interval = setInterval(function() {
            if (currentTime >= seconds) {
                clearInterval(interval);
                startButton.disabled = false;
            } else {
                currentTime++;
                const percentage = (currentTime / seconds) * 100;
                timer.style.width = percentage + '%';
                timer.setAttribute('aria-valuenow', currentTime);
            }
        }, 990);
    }

    window.onload = function() {
        startTimer(60);
    };
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
    </script>
  @endif
@endsection