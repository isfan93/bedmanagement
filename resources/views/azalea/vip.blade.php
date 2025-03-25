
{{-- Start Card VIP--}}
<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="card-title">
        <i class="fas fa-table"></i>
        VIP
      </h3>
      <div>
        Jumlah Bed : <b>{{$jmlBedVip}}</b> Bed
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      {{-- pembatas BED --}}
      @foreach ($vips as $vip)
        <div class="col-sm-4 col-4">
          <div class="card card-default card-outline
            @if($vip->bedstatus==2)
              rencanapulang
            @elseif($vip->bedstatus==3)
              readytoclean
            @elseif($vip->bedstatus==4)
              booking
            @elseif($vip->bedstatus==5)
              waitinglist
            @elseif($vip->bedstatus==6)
              renovasi
            @elseif($vip->bedstatus==7)
              male
            @elseif($vip->bedstatus==8)
              female
            @endif
          ">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">
                  <b>{{$vip->namabed}}</b> | <b>
                    @if($vip->bedstatus==0)
                      Ready To Use
                    @elseif($vip->bedstatus==2)
                      Rencana Pulang
                    @elseif($vip->bedstatus==3)
                      Ready To Clean
                    @elseif($vip->bedstatus==4)
                      Booking
                    @elseif($vip->bedstatus==5)
                      Waiting List
                    @elseif($vip->bedstatus==6)
                      Renovasi
                    @elseif($vip->bedstatus==7)
                      Pria
                    @elseif($vip->bedstatus==8)
                      Wanita
                    @endif</b>
                </h3>
                <div>
                  PPJA : <b>
                    @if (empty($vip->namaperawat))
                      <b>-</b>
                    @else
                      {{$vip->namaperawat}}
                    @endif</b>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="container-fluid">
                @if (empty($vip->namapasien))
                {{-- jika bed kosong --}}
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td>-</td>
                      <td class="text-right">-</td>
                    </tr>
                  </table>
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td>-</td>
                      <td class="text-right">- Tahun</td>
                    </tr>
                  </table>
                  <hr>
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td>-</td>
                    </tr>
                  </table>
                  <hr>
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td>-</td>
                    </tr>
                    <tr>
                      <td>-</td>
                    </tr>
                  </table>
                  <hr>
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td>
                        @if (Auth::user()->role == 'admin')
                          @if($vip->bedstatus==3)
                            <a href="{{ url('azalea/'.$vip->id.'/cleaned') }}" type="button" class="btn btn-block btn-sm btn-info" data-toggle='tooltip' data-placement='left' title='Update data {{$vip->namapasien}}'><i class="fas fa-bed"></i> <b>SELESAI CLEANING</b></a>
                          @else
                            -
                          @endif
                        @endif
                      </td>
                    </tr>
                  </table>
                @else
                {{-- Jika bed terisi --}}
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td>
                        {{$vip->namapasien}}
                      </td>
                      <td class="text-right">
                        <b>{{$vip->norekmed}}</b>
                        @php
                          $tanggallahir = date('d-m-Y', strtotime($vip->tgllahir));
                          $usia = date_diff(date_create($vip->tgllahir),date_create(\Carbon\Carbon::now()))->y;
                        @endphp
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>
                          {{$tanggallahir}}
                        </b>
                      </td>
                      <td class="text-right">
                        <b>{{$usia}}</b>  Tahun
                      </td>
                    </tr>
                    <tr>
                        <td>{{ $vip->agama }}</td>
                    </tr>
                  </table>
                  <hr>
                  <table class="table table-sm table-borderless">
                    @if (!empty($vip->namadpjp1))
                      <tr>
                        <td>
                          DPJP 1 : 
                        </td>
                        <td>
                          <b>{{$vip->namadpjp1}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$vip->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($vip->namadpjp2))
                      <tr>
                        <td>
                          DPJP 2 : 
                        </td>
                        <td>
                          <b>{{$vip->namadpjp2}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$vip->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($vip->namadpjp3))
                      <tr>
                        <td>
                          DPJP 3 : 
                        </td>
                        <td>
                          <b>{{$vip->namadpjp3}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$vip->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($vip->namadpjp4))
                      <tr>
                        <td>
                          DPJP 4 : 
                        </td>
                        <td>
                          <b>{{$vip->namadpjp4}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$vip->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($vip->namadpjp5))
                      <tr>
                        <td>
                          DPJP 5 : 
                        </td>
                        <td>
                          <b>{{$vip->namadpjp5}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$vip->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($vip->namadpjp6))
                      <tr>
                        <td>
                          DPJP 6 : 
                        </td>
                        <td>
                          <b>{{$vip->namadpjp6}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$vip->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                  </table>
                  <hr>
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td>
                        <b>{{$vip->diagnosa}}</b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>{{$vip->namapenjamin}}</b>
                      </td>
                    </tr>
                  </table>
                  <hr>
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td>ASAL PASIEN: <b>{{$vip->asalpasien}}</b></td>
                    </tr>
                    <tr>
                      <td>
                        @if (!empty($vip->tgl_approve))
                          Tgl Masuk Ranap: <b>{{ \Carbon\Carbon::parse($vip->tgl_approve)->format('H:i:s | d-m-Y') }}</b>
                        @else
                          -
                        @endif
                        <br>Waktu  Habis Cairan Infus: <b>@if ($vip->tci_waktuhabisinfus==null)
                            -
                        @else
                            {{\Carbon\Carbon::parse($vip->tci_waktuhabisinfus)->format('H:i:s | d-m-Y') }}
                        @endif</b>
                        <br> 
                        <br>Pasang Infus : <b>{{\Carbon\Carbon::parse($vip->infus_pasang)->format('H:i:s | d-m-Y') }}</b>
                        <br>Ganti Infus : <b>{{\Carbon\Carbon::parse($vip->infus_ganti)->format('H:i:s | d-m-Y') }}</b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        @if (!empty($vip->keterangan))
                          <b>{{$vip->keterangan}}</b>
                        @else
                          -
                        @endif
                      </td>
                    </tr>
                  </table>
                @endif
              </div>
            </div>
            @if (!empty($vip->trx_id))
              @if (Auth::user()->role == 'admin')
                <div class="card-footer">
                  <div class="btn-group container-fluid  p-0">
                    @if ($vip->bedstatus==7)
                      <a href="{{ url('azalea/'.$vip->trx_id.'/edit') }}" type="button" class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='left' title='Update data {{$vip->namapasien}}'><i class="fas fa-bed"></i> <b>UPDATE</b></a>
                      <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#Modal-{{$vip->trx_id}}" data-toggle='tooltip' data-placement='left' title='Pindahkan {{$vip->namapasien}} ke bed atau ruangan lain'><i class="fas fa-bed"></i> <b>MUTASI</b></button>
                      <a href="{{ route('azalea.rencanaPulang', $vip->trxPasien->trx_id) }}" type="button" class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='left' title='Rencanakan {{$vip->namapasien}} pulang' onclick="return  confirm('Apakah anda yakin?')"><i class="fas fa-user-injured"></i> <b>RENCANA PULANG</b></a>
                      
                      @elseif ($vip->bedstatus==8)
                      <a href="{{ url('azalea/'.$vip->trx_id.'/edit') }}" type="button" class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='left' title='Update data {{$vip->namapasien}}'><i class="fas fa-bed"></i> <b>UPDATE</b></a>
                      <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#Modal-{{$vip->trx_id}}" data-toggle='tooltip' data-placement='left' title='Pindahkan {{$vip->namapasien}} ke bed atau ruangan lain'><i class="fas fa-bed"></i> <b>MUTASI</b></button>
                      <a href="{{ url('azalea/'.$vip->trx_id.'/rencanapulang') }}" type="button" class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='left' title='Rencanakan {{$vip->namapasien}} pulang' onclick="return  confirm('Apakah anda yakin?')"><i class="fas fa-user-injured"></i> <b>RENCANA PULANG</b></a>
                    
                      @elseif ($vip->bedstatus==2)
                      <a href="{{ route('azalea.batalrencanaPulang', $vip->trxPasien->trx_id) }}" type="button" class="btn btn-sm btn-warning" data-toggle='tooltip' data-placement='left' title='Batalkan {{$vip->namapasien}} rencana pulang' onclick="return  confirm('Apakah anda yakin?')"><i class="fas fa-procedures"></i> <b>BATAL RENCANA PULANG</b></a>
                      <a href="{{ route('azalea.pulangkanPasien', $vip->trxPasien->trx_id) }}" type="button" class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='left' title='Pulangkan {{$vip->namapasien}}' onclick="return  confirm('Apakah anda yakin akan memulangkan pasien tersebut? tidak bisa dibatalkan apabila telah dipulangkan.')"><i class="fas fa-sign-out-alt"></i> <b>PULANGKAN PASIEN</b></a>
                    @endif
                  </div>
                </div>    
                {{-- modal --}}
                <div class="modal fade" id="Modal-{{$vip->trx_id}}" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="modal">MUTASI: <b>{{$vip->namapasien}}</b> | No RM: <b>{{$vip->norekmed}}</b></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form action="{{ route('azalea.updatebed', $vip->trx_id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                              <input type="hidden" value="{{$vip->id}}" id="bedasal" name="bedasal">
                              <div class="form-group">
                                <label for="bedbooking">Bed Booking <a style="color:red">*</a></label>
                                <select required id="bedbooking" name="bedbooking" class="form-control" style="width: 100%;">
                                  <option disabled selected="selected">-- Pilih salah satu --</option>
                                  @foreach ($beds as $bed)
                                    <option value="{{ $bed->id }}">{{ $bed->ruangan }} {{ $bed->namabed }} - {{ $bed->kelas }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class='btn btn-sm btn-primary'><i class="fa fa-floppy-disk"> </i> SIMPAN</button>
                            </div>
                          </form>
                      </div>
                  </div>
                </div>
              @endif
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
{{-- End Card --}}