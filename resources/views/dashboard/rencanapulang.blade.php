<div class="card card-info card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="card-title">
        <i class="fas fa-user-injured"></i>
        Pasien Rencana Pulang
      </h3>
    </div>
  </div>
  <div class="card-body">
    <table id="rencanapulang" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th style="text-align: center">NO</th>
        <th style="text-align: center">PASIEN</th>
        <th style="text-align: center">KETERANGAN</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1 ?>
      @foreach ($pxRencanaPulangs as $pxRencanaPulang)
          <tr>
            <td style="text-align: center">{{ $no }}</td>
            <td>
              <b>Nama Pasien:</b> <i>{{$pxRencanaPulang->namapasien}}</i><br>
              <b>No RM:</b> <i>{{$pxRencanaPulang->norekmed}}</i>
            </td>
            <td>
              <b>Posisi Pasien:</b> <i>{{ $pxRencanaPulang->ruangan.' - '. $pxRencanaPulang->namabed }}</i><br>
              <b>Waktu Rencana Pulang:</b> <i>{{$pxRencanaPulang->updated_at->format('H:i:s | d-m-Y')}}</i>
            </td>
          </tr>
        <?php $no++ ?>
      @endforeach
    </tbody>
  </table>
  </div>
</div>