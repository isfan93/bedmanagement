<section class="content text-sm">
  <div class="card card-info card-outline">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="card-title">
          <i class="fas fa-bed"></i>
          Bed Renovasi
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
        </tr>
      </thead>
      <tbody>
        <?php $no=1 ?>
        @foreach ($bedRenovAlls as $bedRenovAll)
            <tr>
              <td style="text-align: center">{{ $no }}</td>
              <td>{{ $bedRenovAll->namabed }}</td>
              <td>{{ $bedRenovAll->ruangan }}</td>
            </tr>
          <?php $no++ ?>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
  
  <div class="card card-info card-outline">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="card-title">
          <i class="fas fa-bed"></i>
          Bed Nonaktif
        </h3>
      </div>
    </div>
    <div class="card-body">
      <table id="bednonaktif" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th style="text-align: center">NO</th>
          <th style="text-align: center">BED</th>
          <th style="text-align: center">RUANGAN</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1 ?>
        @foreach ($bedNonaktifAlls as $bedNonaktifAll)
            <tr>
              <td style="text-align: center">{{ $no }}</td>
              <td>{{ $bedNonaktifAll->namabed }}</td>
              <td>{{ $bedNonaktifAll->ruangan }}</td>
            </tr>
          <?php $no++ ?>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</section>