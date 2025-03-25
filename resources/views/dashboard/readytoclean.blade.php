<div class="row">
  <div class="col-4">
    {{-- start tabel waktu clean --}}
    <div class="card card-info card-outline">
      <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="card-title">
            <i class="fas fa-user-injured"></i>
            Bed Ready to Clean -> Ready to Use
          </h3>
        </div>
      </div>
      <div class="card-body">
        <table id="trxcs" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="text-align: center">NO</th>
            <th style="text-align: center">No Bed</th>
            <th style="text-align: center">KETERANGAN</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1 ?>
          @foreach ($trxcln as $clean)
              <tr>
                <td style="text-align: center">{{ $no }}</td>
                <td>
                  <b>Nama Pasien:</b> <i>{{ $clean->namapasien }}</i><br>
                  <b>Ruangan:</b> <i>{{$clean->ruangan}}</i><br>
                  <b>No Bed:</b> <i>{{$clean->nama_bed}}</i>
                </td>
                <td>
                  <b>Waktu Kamar dibersihkan :</b> <i>{{$clean->tgl_pulang}}</i><br>
                  <b>Waktu Selesai dibersihkan:</b> <i>{{$clean->tgl_clean}}</i><br>
                  <b>Lama Pembersihan:</b> <i>{{ $clean->waktu_cleaning }}</i>
                </td>
              </tr>
            <?php $no++ ?>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    {{-- end tabel waktu clean --}}
  </div>

  <div class="col-4">
    <div class="card card-info card-outline">
      <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="card-title">
            <i class="fas fa-bed"></i>
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
  
  </div>

  <div class="col-4">
    <div class="card card-info card-outline">
      <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="card-title">
            <i class="fas fa-bed"></i>
            Bed Ready to Clean 
          </h3>
        </div>
      </div>
      <div class="card-body">
        <table id="bedrenov" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="text-align: center">NO</th>
            <th style="text-align: center">BED</th>
            <th style="text-align: center">RUANGAN</th>
            <th style="text-align: center">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1 ?>
          @foreach ($bedClean as $bedToclean)
              <tr>
                <td style="text-align: center">{{ $no }}</td>
                <td>{{ $bedToclean->namabed }}</td>
                <td>{{ $bedToclean->ruangan }}</td>
                {{-- <td>{{ $bedToclean->id }}</td> --}}
                <td>
                  @if(is_null($bedToclean->tgl_pulang))
                  <form action="{{ route('cleaning.MulaiBersihkan', $bedToclean->id) }}" method="post">
                    @csrf
                    <button class="btn btn-warning btn-sm">Bersihkan</button>
                  </form>
                  @else
                  <form action="{{ route('cleaning.SelesaiBersihkan', $bedToclean->id) }}" method="post">
                    @csrf
                    <button class="btn btn-success btn-sm">Selesai</button>
                  </form>
                  @endif
                  <div class="btn-group" role="group" aria-label="Basic example">
                    
                   {{-- <a href="{{ route('cleaning.MulaiBersihkan', $bedToclean->id) }}" class="btn btn-success btn-sm">Bersihkan</a> --}}
                    {{-- <button type="submit" class="btn btn-success">Selesai</button> --}}
                  </div>
                </td>
              </tr>
            <?php $no++ ?>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
  
  </div>
</div>

<script>
  function handleCleanButton(button, selesaiUrl) {
    // Ubah nama tombol dan warnanya
    button.textContent = "Selesai";
    button.classList.remove('btn-success');
    button.classList.add('btn-primary');

    // Tambahkan aksi untuk menyelesaikan pembersihan
    button.setAttribute('onclick', `handleFinishButton(this, '${selesaiUrl}')`);
}

function handleFinishButton(button, selesaiUrl) {
    // Kirim permintaan untuk menyimpan status selesai
    fetch(selesaiUrl, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => {
        if (response.ok) {
            button.textContent = "Sudah Selesai";
            button.classList.remove('btn-primary');
            button.classList.add('btn-secondary');
            button.setAttribute('disabled', 'true'); // Nonaktifkan tombol
        } else {
            alert('Gagal memperbarui status.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

</script>










 
