<div class="card card-danger">
  <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="card-title">
        <i class="fas fa-table"></i>
        Tabel Habis Cairan Infus
      </h3>
    </div>
  </div>
  <div class="card-body">
    <table id="hci" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th style="text-align: center">PASIEN</th>
          <th style="text-align: center">WAKTU HCI</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tcis as $tci)
          <tr>
            <td>{{$tci->namapasien}}</td>
            <td>{{\Carbon\Carbon::parse($tci->tci_waktuhabisinfus)->format('H:i:s | d-m-Y') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{-- Start Card --}}
<div class="card card-info card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="card-title">
        <i class="fas fa-table"></i>
        Tabel Waiting List/ Booking
      </h3>
    </div>
  </div>
  <div class="card-body">
    <table id="waitinglist" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th style="text-align: center">PASIEN</th>
        <th style="text-align: center">TRANSAKSI</th>
        @if (Auth::user()->role == 'admin')
          <th width="5%" style="text-align: center">#</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach ($pxBookings as $pxBooking)
        @if ($pxBooking->bedTujuan->ruangan == 'ALYSSUM')
          <tr>
            <td>
              {{$pxBooking->trxPasien->namapasien}}<br>
              <b><i>{{$pxBooking->trxPasien->norekmed}}</i></b>
            </td>
            <td>
              Asal: <i>
              @if ($pxBooking->bed_asal==0)
              <b>Booking Pendaftaran | {{$pxBooking->trxPasien->asalpasien}}</b></i>
              @else
                <b>{{$pxBooking->bedAsal->namabed}} | {{$pxBooking->bedAsal->ruangan}} | {{$pxBooking->bedAsal->kelas}}</b></i>
              @endif
              <br>
              Tujuan: <b>{{$pxBooking->bedTujuan->namabed}} | {{$pxBooking->bedTujuan->ruangan}} | {{$pxBooking->bedTujuan->kelas}}</b>
            </td>
            @if (Auth::user()->role == 'admin')
              <td  width='89px' style="text-align: center"> 
                <div class="btn-group">
                  @if($pxBooking->bedTujuan->bedstatus<>3)
                    <a href="{{ route('allysum.approveBooking', $pxBooking->trxPasien->trx_id) }}" class='btn btn-sm btn-primary' data-toggle='tooltip' data-placement='left' title='Approve pasien' onclick="return  confirm('Apakah anda yakin?')"><i class="fas fa-check"></i></a>
                  @endif
                  <a href="{{ route('allysum.batalranap', $pxBooking->trxPasien->trx_id) }}" class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='left' title='Cancel pasien' onclick="return  confirm('Apakah anda yakin?')"><i class="fas fa-times-circle"></i></a>
                </div>
              </td>
            @endif
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
  </div>
</div>
{{-- End Card --}}

{{-- Start Card --}}
<div class="card card-info card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="card-title">
        <i class="fas fa-table"></i>
        Tabel Dokter DPJP
      </h3>
    </div>
  </div>
  <div class="card-body">
    <table id="dokterdpjp" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th style="text-align: center">NO</th>
          <th style="text-align: center">DOKTER</th>
          <th style="text-align: center">JML PASIEN</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach ($dpjpPasiens as $dpjpPasien)
          @if ($dpjpPasien->ruangan == 'ALYSSUM')
            <tr>
              <td style="text-align: center">{{ $no }}</td>
              <td>
                {{ $dpjpPasien->namadokter}}
              </td>
              <td style="text-align: center">
                  <b>{{ $dpjpPasien->QTY}}</b>
              </td>
            </tr>
            <?php $no++ ?>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>
{{-- End Card --}}