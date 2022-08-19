<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <!--login form Modal -->
        <div wire:ignore.self class="modal fade text-left" id="createModal" tabindex="-1" role="dialog" aria-labelledby="create-modal"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="create-modal">Login Form </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <form class="form form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label>Provinsi</label>
                                </div>
                                <div class="col-md-8 form-group ">
                                    <div class="position-relative">
                                        <div class="form-group">
                                            <select data-select2-id="select-provinsi" id="select-provinsi" placeholder="Cari Provinsi"
                                                    class="select2 form-control">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="label-kota" class="col-md-4 text-right">
                                    <label>Kabupaten / Kota</label>
                                </div>
                                <div id="sel-kota" class="col-md-8 form-group">
                                    <div class="position-relative">
                                        <div class="form-group">
                                            <select data-select2-id="select-kota" id="select-kota" class="select2 form-control">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="label-kec" class="col-md-4 text-right">
                                    <label>Kecamatan</label>
                                </div>
                                <div id="sel-kec" class="col-md-8 form-group ">
                                    <div class="position-relative">
                                        <div class="form-group">
                                            <select data-select2-id="select-kec" id="select-kec"
                                                    class="select2 form-control">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="label-desa" class="col-md-4 text-right">
                                    <label>Kelurahan / Desa</label>
                                </div>
                                <div id="sel-desa" class="col-md-8 form-group ">
                                    <div class="position-relative">
                                        <div class="form-group">
                                            <select data-select2-id="select-desa" id="select-desa"
                                                    class="select2 form-control">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <label>Nama TPS</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" id="tps-icon" class="form-control" name="nama_tps" placeholder="Nama TPS">
                                        <div class="form-control-position">
                                            <i class="bx bx-box"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <div class="position-relative has-icon-left">
                                        <input type="email" id="email-icon" class="form-control" name="email-id-icon" placeholder="Email">
                                        <div class="form-control-position">
                                            <i class="bx bx-mail-send"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <label>Password</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <div class="position-relative has-icon-left">
                                        <input type="password" id="pass-icon" class="form-control" name="contact-icon" placeholder="Password">
                                        <div class="form-control-position">
                                            <i class="bx bx-lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end ">
                                    <button type="button" class="btn btn-light-secondary mr-1 mb-1 close-btn" data-dismiss="modal">Close</button>
                                    <button type="button" wire:click.prevent="store()" class="btn btn-primary mr-1 mb-1 close-modal">Save changes</button>

{{--                                    <button type="button" wire:click.prevent="cancel()" class="btn btn-light-secondary mr-1 mb-1" data-dismiss="modal">Close</button>--}}
{{--                                    <button type="button" wire:click.prevent="update()" class="btn btn-primary mr-1 mb-1" data-dismiss="modal">Save changes</button>--}}
{{--                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>--}}
{{--                                    <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>--}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
