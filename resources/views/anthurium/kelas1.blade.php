
{{-- Start Card VIP--}}
<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="card-title">
        <i class="fas fa-table"></i>
        KELAS 1
      </h3>
      <div>
        Jumlah Bed : <b>{{$jmlBedKelas1}}</b> Bed
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      {{-- pembatas BED --}}
      @foreach ($kls1s as $kls1)
        <div class="col-sm-4 col-4">
          <div class="card card-default card-outline
            @if($kls1->bedstatus==2)
              rencanapulang
            @elseif($kls1->bedstatus==3)
              readytoclean
            @elseif($kls1->bedstatus==4)
              booking
            @elseif($kls1->bedstatus==5)
              waitinglist
            @elseif($kls1->bedstatus==6)
              renovasi
            @elseif($kls1->bedstatus==7)
              male
            @elseif($kls1->bedstatus==8)
              female
            @endif
          ">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">
                  <b>{{$kls1->namabed}}</b> | <b>
                    @if($kls1->bedstatus==0)
                      Ready To Use
                    @elseif($kls1->bedstatus==2)
                      Rencana Pulang
                    @elseif($kls1->bedstatus==3)
                      Ready To Clean
                    @elseif($kls1->bedstatus==4)
                      Booking
                    @elseif($kls1->bedstatus==5)
                      Waiting List
                    @elseif($kls1->bedstatus==6)
                      Renovasi
                    @elseif($kls1->bedstatus==7)
                      Pria
                    @elseif($kls1->bedstatus==8)
                      Wanita
                    @endif</b>
                </h3>
                <div>
                  PPJA : <b>
                    @if (empty($kls1->namaperawat))
                      <b>-</b>
                    @else
                      {{$kls1->namaperawat}}
                    @endif</b>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="container-fluid">
                @if (empty($kls1->namapasien))
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
                          @if($kls1->bedstatus==3)
                            <a href="{{ url('anthurium/'.$kls1->id.'/cleaned') }}" type="button" class="btn btn-block btn-sm btn-info" data-toggle='tooltip' data-placement='left' title='Update data {{$kls1->namapasien}}'><i class="fas fa-bed"></i> <b>SELESAI CLEANING</b></a>
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
                        {{$kls1->namapasien}}
                      </td>
                      <td class="text-right">
                        <b>{{$kls1->norekmed}}</b>
                        @php
                          $tanggallahir = date('d-m-Y', strtotime($kls1->tgllahir));
                          $usia = date_diff(date_create($kls1->tgllahir),date_create(\Carbon\Carbon::now()))->y;
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
                        <td>{{ $kls1->agama }}</td>
                    </tr>
                  </table>
                  <hr>
                  <table class="table table-sm table-borderless">
                    @if (!empty($kls1->namadpjp1))
                      <tr>
                        <td>
                          DPJP 1 : 
                        </td>
                        <td>
                          <b>{{$kls1->namadpjp1}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$kls1->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($kls1->namadpjp2))
                      <tr>
                        <td>
                          DPJP 2 : 
                        </td>
                        <td>
                          <b>{{$kls1->namadpjp2}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$kls1->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($kls1->namadpjp3))
                      <tr>
                        <td>
                          DPJP 3 : 
                        </td>
                        <td>
                          <b>{{$kls1->namadpjp3}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$kls1->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($kls1->namadpjp4))
                      <tr>
                        <td>
                          DPJP 4 : 
                        </td>
                        <td>
                          <b>{{$kls1->namadpjp4}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$kls1->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($kls1->namadpjp5))
                      <tr>
                        <td>
                          DPJP 5 : 
                        </td>
                        <td>
                          <b>{{$kls1->namadpjp5}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$kls1->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($kls1->namadpjp6))
                      <tr>
                        <td>
                          DPJP 6 : 
                        </td>
                        <td>
                          <b>{{$kls1->namadpjp6}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$kls1->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                  </table>
                  <hr>
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td>
                        <b>{{$kls1->diagnosa}}</b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>{{$kls1->namapenjamin}}</b>
                      </td>
                    </tr>
                  </table>
                  <hr>
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td>ASAL PASIEN: <b>{{$kls1->asalpasien}}</b></td>
                    </tr>
                    <tr>
                      <td>
                        @if (!empty($kls1->tgl_approve))
                          Tgl Masuk Ranap: <b>{{ \Carbon\Carbon::parse($kls1->tgl_approve)->format('H:i:s | d-m-Y') }}</b>
                        @else
                          -
                        @endif
                        <br>Waktu  Habis Cairan Infus: <b>@if ($kls1->tci_waktuhabisinfus==null)
                            -
                        @else
                            {{\Carbon\Carbon::parse($kls1->tci_waktuhabisinfus)->format('H:i:s | d-m-Y') }}
                        @endif</b>
                         <br> 
                        <br>Pasang Infus : <b>{{\Carbon\Carbon::parse($kls1->infus_pasang)->format('H:i:s | d-m-Y') }}</b>
                        <br>Ganti Infus :  <b>{{\Carbon\Carbon::parse($kls1->infus_ganti)->format('H:i:s | d-m-Y') }}</b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        @if (!empty($kls1->keterangan))
                          <b>{{$kls1->keterangan}}</b>
                        @else
                          -
                        @endif
                      </td>
                    </tr>
                  </table>
                @endif
              </div>
            </div>
            @if (!empty($kls1->trx_id))
              @if (Auth::user()->role == 'admin')
                <div class="card-footer">
                  <div class="btn-group container-fluid  p-0">
                    @if ($kls1->bedstatus==7)
                      <a href="{{ url('anthurium/'.$kls1->trx_id.'/edit') }}" type="button" class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='left' title='Update data {{$kls1->namapasien}}'><i class="fas fa-bed"></i> <b>UPDATE</b></a>
                      <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#Modal-{{$kls1->trx_id}}" data-toggle='tooltip' data-placement='left' title='Pindahkan {{$kls1->namapasien}} ke bed atau ruangan lain'><i class="fas fa-bed"></i> <b>MUTASI</b></button>
                      <a href="{{ route('anthurium.rencanaPulang', $kls1->trxPasien->trx_id) }}" type="button" class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='left' title='Rencanakan {{$kls1->namapasien}} pulang' onclick="return  confirm('Apakah anda yakin?')"><i class="fas fa-user-injured"></i> <b>RENCANA PULANG</b></a>
                      
                      @elseif ($kls1->bedstatus==8)
                      <a href="{{ url('anthurium/'.$kls1->trx_id.'/edit') }}" type="button" class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='left' title='Update data {{$kls1->namapasien}}'><i class="fas fa-bed"></i> <b>UPDATE</b></a>
                      <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#Modal-{{$kls1->trx_id}}" data-toggle='tooltip' data-placement='left' title='Pindahkan {{$kls1->namapasien}} ke bed atau ruangan lain'><i class="fas fa-bed"></i> <b>MUTASI</b></button>
                      <a href="{{ url('anthurium/'.$kls1->trx_id.'/rencanapulang') }}" type="button" class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='left' title='Rencanakan {{$kls1->namapasien}} pulang' onclick="return  confirm('Apakah anda yakin?')"><i class="fas fa-user-injured"></i> <b>RENCANA PULANG</b></a>
                    
                      @elseif ($kls1->bedstatus==2)
                      <a href="{{ route('anthurium.batalrencanaPulang', $kls1->trxPasien->trx_id) }}" type="button" class="btn btn-sm btn-warning" data-toggle='tooltip' data-placement='left' title='Batalkan {{$kls1->namapasien}} rencana pulang' onclick="return  confirm('Apakah anda yakin?')"><i class="fas fa-procedures"></i> <b>BATAL RENCANA PULANG</b></a>
                      <a href="{{ route('anthurium.pulangkanPasien', $kls1->trxPasien->trx_id) }}" type="button" class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='left' title='Pulangkan {{$kls1->namapasien}}' onclick="return  confirm('Apakah anda yakin akan memulangkan pasien tersebut? tidak bisa dibatalkan apabila telah dipulangkan.')"><i class="fas fa-sign-out-alt"></i> <b>PULANGKAN PASIEN</b></a>
                    @endif
                  </div>
                </div>    
                {{-- modal --}}
                <div class="modal fade" id="Modal-{{$kls1->trx_id}}" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="modal">MUTASI: <b>{{$kls1->namapasien}}</b> | No RM: <b>{{$kls1->norekmed}}</b></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form action="{{ route('anthurium.updatebed', $kls1->trx_id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                              <input type="hidden" value="{{$kls1->id}}" id="bedasal" name="bedasal">
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