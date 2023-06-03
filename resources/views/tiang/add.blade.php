<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-bs-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="p-4">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            New</span>
                        <span class="fw-light">
                            Lokasi Tiang
                        </span>
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close"
                        style="background: none; border: none;">
                        <i class="bi bi-x-lg text-danger"></i>
                    </button>
                </div>

                <form action="{{ route('add.tiang') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12 mb-2">
                            <div class="form-group form-group-default">
                                <label><span class="text-primary">!</span>Nama Tiang</label>
                                <input name="name" type="text" id="name"
                                    class="form-control mb-0 @error ('name') is-invalid @enderror"
                                    placeholder="Nama Tiang">

                                @error('name')
                                <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group form-group-default">
                                <label><span class="text-primary">!</span>Provinsi</label>
                                <input name="provinsi" id="provinsi" type="text"
                                    class="form-control mb-0 @error ('name') is-invalid @enderror"
                                    placeholder="Provinsi">

                                @error('provinsi')
                                <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group form-group-default">
                                <label><span class="text-primary">!</span>Kabupaten</label>
                                <input name="kabupaten" id="kabupaten"
                                    class="form-control mb-0 @error ('kabupaten') is-invalid @enderror"
                                    placeholder="Kabupaten">

                                @error('kabupaten')
                                <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group form-group-default">
                                <label><span class="text-primary">!</span>Kecamatan</label>
                                <input name="kecamatan" id="kecamatan" type="text"
                                    class="form-control mb-0 @error ('kecamatan') is-invalid @enderror"
                                    placeholder="Kecamatan">

                                @error('kecamatan')
                                <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group form-group-default">
                                <label><span class="text-primary">!</span>Desa</label>
                                <input name="desa" id="desa" class="form-control mb-0 @error ('desa') is-invalid @enderror"
                                    placeholder="Desa">

                                @error('desa')
                                <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12 mb-2">
                            <div calass="form-group form-group-default">
                                <label><span class="text-primary">!</span>Alamat</label>
                                <textarea name="alamat" id="alamat" type="text" class="form-control mb-0 @error ('maps') is-invalid @enderror" placeholder="Alamat"></textarea>
                                @error('alamat')
                                <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="form-group form-group-default">
                                <label><span class="text-primary">!</span>Maps link Tiang</label>
                                <input type="link" name="maps" id="maps" type="text" class="form-control mb-0 @error ('maps') is-invalid @enderror"
                                    placeholder="Maps Tiang">
                                @error('maps')
                                <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-12 mb-2 pr-0">
                            <div class="form-group form-group-default">
                                <label><span class="text-primary">!</span>Owner</label>
                                <select name="owner" id="owner" class="form-control">
                                    <option value="" selected disabled>Pilih</option>
                                </select>
                                @error('owner')
                                <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-sm-12 mb-2">
                            <div calass="form-group form-group-default">
                                <label>Comment</label>
                                <textarea name="comment" id="comment" type="text" class="form-control"
                                    placeholder="Comment"></textarea>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary col-12">Add <i class="bi bi-diagram-2"></i></button>
                </form>

            </div>
        </div>
    </div>
</div>
