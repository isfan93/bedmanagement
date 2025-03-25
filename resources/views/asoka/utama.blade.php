
{{-- Start Card VIP--}}
<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <h3 class="card-title">
        <i class="fas fa-table"></i>
        UTAMA
      </h3>
      <div>
        Jumlah Bed : <b>{{$jmlBedUtama}}</b> Bed
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      {{-- pembatas BED --}}
      @foreach ($utamas as $utama)
        <div class="col-sm-4 col-4">
          <div class="card card-default card-outline
            @if($utama->bedstatus==2)
              rencanapulang
            @elseif($utama->bedstatus==3)
              readytoclean
            @elseif($utama->bedstatus==4)
              booking
            @elseif($utama->bedstatus==5)
              waitinglist
            @elseif($utama->bedstatus==6)
              renovasi
            @elseif($utama->bedstatus==7)
              male
            @elseif($utama->bedstatus==8)
              female
            @endif
          ">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">
                  <b>{{$utama->namabed}}</b> | <b>
                    @if($utama->bedstatus==0)
                      Ready To Use
                    @elseif($utama->bedstatus==2)
                      Rencana Pulang
                    @elseif($utama->bedstatus==3)
                      Ready To Clean
                    @elseif($utama->bedstatus==4)
                      Booking
                    @elseif($utama->bedstatus==5)
                      Waiting List
                    @elseif($utama->bedstatus==6)
                      Renovasi
                    @elseif($utama->bedstatus==7)
                      Pria
                    @elseif($utama->bedstatus==8)
                      Wanita
                    @endif</b>
                </h3>
                <div>
                  PPJA : <b>
                    @if (empty($utama->namaperawat))
                      <b>-</b>
                    @else
                      {{$utama->namaperawat}}
                    @endif</b>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="container-fluid">
                @if (empty($utama->namapasien))
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
                          @if($utama->bedstatus==3)
                            <a href="{{ url('asoka/'.$utama->id.'/cleaned') }}" type="button" class="btn btn-block btn-sm btn-info" data-toggle='tooltip' data-placement='left' title='Update data {{$utama->namapasien}}'><i class="fas fa-bed"></i> <b>SELESAI CLEANING</b></a>
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
                        {{$utama->namapasien}}
                      </td>
                      <td class="text-right">
                        <b>{{$utama->norekmed}}</b>
                        @php
                          $tanggallahir = date('d-m-Y', strtotime($utama->tgllahir));
                          $usia = date_diff(date_create($utama->tgllahir),date_create(\Carbon\Carbon::now()))->y;
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
                        <td>{{ $utama->agama }}</td>
                    </tr>
                  </table>
                  <hr>
                  <table class="table table-sm table-borderless">
                    @if (!empty($utama->namadpjp1))
                      <tr>
                        <td>
                          DPJP 1 : 
                        </td>
                        <td>
                          <b>{{$utama->namadpjp1}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$utama->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($utama->namadpjp2))
                      <tr>
                        <td>
                          DPJP 2 : 
                        </td>
                        <td>
                          <b>{{$utama->namadpjp2}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$utama->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($utama->namadpjp3))
                      <tr>
                        <td>
                          DPJP 3 : 
                        </td>
                        <td>
                          <b>{{$utama->namadpjp3}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$utama->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($utama->namadpjp4))
                      <tr>
                        <td>
                          DPJP 4 : 
                        </td>
                        <td>
                          <b>{{$utama->namadpjp4}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$utama->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($utama->namadpjp5))
                      <tr>
                        <td>
                          DPJP 5 : 
                        </td>
                        <td>
                          <b>{{$utama->namadpjp5}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$utama->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                    @if (!empty($utama->namadpjp6))
                      <tr>
                        <td>
                          DPJP 6 : 
                        </td>
                        <td>
                          <b>{{$utama->namadpjp6}}</b>
                        </td>
                        {{-- Tombol Visite --}}
                        {{-- <td>
                          <a href="#" class="btn btn-sm btn-info toastrDefaultError" data-toggle='tooltip' data-placement='left' title='Visite Dokter {{$utama->namadpjp1}}' onclick="return  confirm('Apakah anda yakin?')"> VISITE</a>
                        </td> --}}
                      </tr>
                    @endif
                  </table>
                  <hr>
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td>
                        <b>{{$utama->diagnosa}}</b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>{{$utama->namapenjamin}}</b>
                      </td>
                    </tr>
                  </table>
                  <hr>
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td>ASAL PASIEN: <b>{{$utama->asalpasien}}</b></td>
                    </tr>
                    <tr>
                      <td>
                        @if (!empty($utama->tgl_approve))
                          Tgl Masuk Ranap: <b>{{ \Carbon\Carbon::parse($utama->tgl_approve)->format('H:i:s | d-m-Y') }}</b>
                        @else
                          -
                        @endif
                        <br>Waktu  Habis Cairan Infus: <b>@if ($utama->tci_waktuhabisinfus==null)
                            -
                        @else
                            {{\Carbon\Carbon::parse($utama->tci_waktuhabisinfus)->format('H:i:s | d-m-Y') }}
                        @endif</b>
                        <br> 
                        <br>Pasang Infus : <b>{{\Carbon\Carbon::parse($utama->infus_pasang)->format('H:i:s | d-m-Y') }}</b>
                        <br>Ganti Infus :  <b>{{\Carbon\Carbon::parse($utama->infus_ganti)->format('H:i:s | d-m-Y') }}</b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        @if (!empty($utama->keterangan))
                          <b>{{$utama->keterangan}}</b>
                        @else
                          -
                        @endif
                      </td>
                    </tr>
                  </table>
                @endif
              </div>
            </div>
            @if (!empty($utama->trx_id))
              @if (Auth::user()->role == 'admin')
                <div class="card-footer">
                  <div class="btn-group container-fluid  p-0">
                    @if ($utama->bedstatus==7)
                      <a href="{{ url('asoka/'.$utama->trx_id.'/edit') }}" type="button" class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='left' title='Update data {{$utama->namapasien}}'><i class="fas fa-bed"></i> <b>UPDATE</b></a>
                      <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#Modal-{{$utama->trx_id}}" data-toggle='tooltip' data-placement='left' title='Pindahkan {{$utama->namapasien}} ke bed atau ruangan lain'><i class="fas fa-bed"></i> <b>MUTASI</b></button>
                      <a href="{{ route('asoka.rencanaPulang', $utama->trxPasien->trx_id) }}" type="button" class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='left' title='Rencanakan {{$utama->namapasien}} pulang' onclick="return  confirm('Apakah anda yakin?')"><i class="fas fa-user-injured"></i> <b>RENCANA PULANG</b></a>
                      
                      @elseif ($utama->bedstatus==8)
                      <a href="{{ url('asoka/'.$utama->trx_id.'/edit') }}" type="button" class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='left' title='Update data {{$utama->namapasien}}'><i class="fas fa-bed"></i> <b>UPDATE</b></a>
                      <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#Modal-{{$utama->trx_id}}" data-toggle='tooltip' data-placement='left' title='Pindahkan {{$utama->namapasien}} ke bed atau ruangan lain'><i class="fas fa-bed"></i> <b>MUTASI</b></button>
                      <a href="{{ url('asoka/'.$utama->trx_id.'/rencanapulang') }}" type="button" class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='left' title='Rencanakan {{$utama->namapasien}} pulang' onclick="return  confirm('Apakah anda yakin?')"><i class="fas fa-user-injured"></i> <b>RENCANA PULANG</b></a>
                    
                      @elseif ($utama->bedstatus==2)
                      <a href="{{ route('asoka.batalrencanaPulang', $utama->trxPasien->trx_id) }}" type="button" class="btn btn-sm btn-warning" data-toggle='tooltip' data-placement='left' title='Batalkan {{$utama->namapasien}} rencana pulang' onclick="return  confirm('Apakah anda yakin?')"><i class="fas fa-procedures"></i> <b>BATAL RENCANA PULANG</b></a>
                      <a href="{{ route('asoka.pulangkanPasien', $utama->trxPasien->trx_id) }}" type="button" class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='left' title='Pulangkan {{$utama->namapasien}}' onclick="return  confirm('Apakah anda yakin akan memulangkan pasien tersebut? tidak bisa dibatalkan apabila telah dipulangkan.')"><i class="fas fa-sign-out-alt"></i> <b>PULANGKAN PASIEN</b></a>
                    @endif
                  </div>
                </div>    
                {{-- modal --}}
                <div class="modal fade" id="Modal-{{$utama->trx_id}}" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="modal">MUTASI: <b>{{$utama->namapasien}}</b> | No RM: <b>{{$utama->norekmed}}</b></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form action="{{ route('asoka.updatebed', $utama->trx_id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                              <input type="hidden" value="{{$utama->id}}" id="bedasal" name="bedasal">
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