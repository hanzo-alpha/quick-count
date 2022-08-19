<form class="form form-vertical" method="POST" action="{{ route('data-tps.store') }}">
    @csrf
    <div class="modal-body" id="modal-body">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {{--          <label for="select-provinsi-add">Provinsi</label>--}}
                    <div class="position-relative">
                        <div class="form-group">
                            {{--              {!! Form::select('provinsi',[],null,['id'=>'select-provinsiAdd','class' =>'form-control selectProvinsiAdd select2']) !!}--}}
                            <select class="form-control selectProvinsiAdd select2" id="select-provinsi-add" name="provinsi"></select>
                            @error('provinsi')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {{--          <label for="select-kota">Kabupaten / Kota</label>--}}
                    <div class="position-relative">
                        <div class="form-group">
                            {{--              {!! Form::select('kota',[],null,['id'=>'select-kotaAdd','class' =>'form-control selectKotaAdd select2']) !!}--}}
                            <select class="form-control selectKotaAdd select2" id="select-kota-add" name="kota"></select>
                            @error('kota')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {{--          <label for="select-kecamatan">Kecamatan</label>--}}
                    <div class="position-relative">
                        <div class="form-group">
                            {{--              {!! Form::select('kecamatan',[],null,['id'=>'select-kecamatanAdd','class' =>'form-control selectKecAdd select2']) !!}--}}
                            <select class="form-control selectKecAdd select2" id="select-kecamatan-add" name="kecamatan"></select>
                            @error('kecamatan')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    {{--          <label for="select-desa">Kelurahan / Desa</label>--}}
                    <div class="position-relative">
                        <div class="form-group">
                            {{--              {!! Form::select('desa',[],null,['id'=>'select-desaAdd','class' =>'form-control selectDesaAdd select2']) !!}--}}
                            <select class="form-control selectDesaAdd select2" id="select-desa-add" name="desa"></select>
                            @error('desa')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="position-relative">
                <div class="form-group">
                    {!! Form::text('jumlah_tps','',['class' => 'form-control','id' =>'jumlah-tps','placeholder' => 'Jumlah TPS']) !!}
                    <div class="form-control-position">
                        <i class="bx bx-calculator"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="position-relative">
                <div class="form-group">
                    {!! Form::textarea('keterangan','',['class' => 'form-control','id' => 'keterangan','placeholder' => 'Keterangan']) !!}
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end ">
            <button id="btnSubmit" type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
            <button id="btnReset" type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
        </div>
    </div>
</form>
