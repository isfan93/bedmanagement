<div class="card card-info card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="card-title">
        <i class="fas fa-user-injured"></i>
        Pasien Pulang
      </h3>
    </div>
  </div>
  <div class="card-body">
    <table id="pxpulang" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th style="text-align: center">NO</th>
        <th style="text-align: center">PASIEN</th>
        <th style="text-align: center">KETERANGAN</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1 ?>
      @foreach ($pxPulangs as $pxPulang)
          <tr>
            <td style="text-align: center">{{ $no }}</td>
            <td>
              <b>Nama Pasien:</b> <i>{{$pxPulang->namapasien}}</i><br>
              <b>No RM:</b> <i>{{$pxPulang->norekmed}}</i>
            </td>
            <td>
              <b>Waktu Naik Ranap:</b> <i>{{\Carbon\Carbon::parse($pxPulang->tgl_approve)->format('H:i:s | d-m-Y') }}</i><br>
              <b>Waktu Pulang Pasien:</b> <i>{{ $pxPulang->updated_at->format('H:i:s | d-m-Y') }}</i><br>
              <b>Lama Ranap:</b> <i>{{ $pxPulang->selisih}} Hari</i>
            </td>
          </tr>
        <?php $no++ ?>
      @endforeach
    </tbody>
  </table>
  </div>
</div>