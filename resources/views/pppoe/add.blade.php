<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-bs-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="p-4">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            New</span>
                        <span class="fw-light">
                            Secret PPPoE
                        </span>
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close" style="background: none; border: none;">
                        <i class="bi bi-x-lg text-danger"></i>
                    </button>
                </div>

                <form action="{{ route('add.pppoe.secret') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12 mb-2">
                            <div class="form-group form-group-default">
                                <label>Username</label>
                                <input name="user" type="text" id="user" class="mb-0 form-control @error ('user') is-invalid @enderror" placeholder="Username">

                                @error('user')
                                    <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12 mb-2">
                            <div class="form-group form-group-default">
                                <label>Password</label>
                                <input name="password" type="text" id="password" class="mb-0 form-control @error ('password') is-invalid @enderror" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-2 pr-0">
                            <div class="form-group form-group-default">
                                <label>Service</label>
                                <select name="service" id="service" class="form-control">
                                    <option value="" selected disabled>Pilih</option>
                                    <option value="any">ANY</option>
                                    <option value="async">ASYNC</option>
                                    <option value="pppoe">PPPoE</option>
                                    <option value="pptp">PPTP</option>
                                    <option value="sstp">SSTP</option>
                                    <option value="l2tp">L2TP</option>
                                    <option value="ovpn">OVPN</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group form-group-default">
                                <label>Profile</label>
                                <select name="profile" id="profile" class="form-control" placeholder="Profile">
                                    <option disabled selected value="">Pilih</option>
                                    @foreach ($profile as $data)
                                    <option>{{ $data['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group form-group-default">
                                <label>Local Address</label>
                                <input name="localaddress" id="localaddress" type="text" class="form-control"
                                    placeholder="Local Address">
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group form-group-default">
                                <label>Remote Address</label>
                                <input name="remoteaddress" id="remoteaddress" class="form-control"
                                    placeholder="Remote Address">
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
                    <button type="submit" class="btn btn-primary col-12">Add <i class="bi bi-rocket-takeoff-fill"></i></button>
                </form>

            </div>
        </div>
    </div>
</div>
