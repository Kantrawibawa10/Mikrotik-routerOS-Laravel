<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-bs-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="p-4">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            New</span>
                        <span class="fw-light">
                            Hotspot Users
                        </span>
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close"
                        style="background: none; border: none;">
                        <i class="bi bi-x-lg text-danger"></i>
                    </button>
                </div>

                <form action="{{ route('add.hotspot.users') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12 mb-2">
                            <div class="form-group form-group-default">
                                <label>User</label>
                                <input name="user" type="text" class="form-control @error ('user') is-invalid @enderror" placeholder="User" required>

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
                                <input name="password" type="text" class="form-control @error ('password') is-invalid @enderror" placeholder="Password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="font-size: 11px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6 mb-2">
                            <div class="form-group form-group-default">
                                <label>Server</label>
                                <select name="server" class="form-control" placeholder="Password" required>
                                    <option disabled selected>Pilih</option>
                                    @foreach ($server as $data)
                                    <option>{{ $data['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-2">
                            <div class="form-group form-group-default">
                                <label>Profile</label>
                                <select name="profile" class="form-control" placeholder="Profile" required>
                                    <option disabled selected>Pilih</option>
                                    @foreach ($profile as $data)
                                    <option>{{ $data['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-2">
                            <div class="form-group form-group-default">
                                <label>Time Limit</label>
                                <input name="timelimit" type="text" class="form-control" placeholder="Time Limit">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-group form-group-default">
                                <label>Comment</label>
                                <textarea name="comment" class="form-control" placeholder="Comment"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-12">Add <i class="bi bi-hdd-stack-fill"></i></button>
                </form>

            </div>
        </div>
    </div>
</div>
