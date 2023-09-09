<!-- Modal -->
<div class="modal fade" id="karyawanModalEdit" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('karyawan.store') }}" id="updateKaryawan" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFullTitle">Edit Karyawan</h5>
                    <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2 mb-3" >
                        <div class="col">
                            <label for="fullname" class="form-label">Nama Lengkap</label>  <span class="text-danger">*</span>
                            <input
                                type="text"
                                id="Editfullname"
                                name="fullname"
                                class="form-control"
                                placeholder="Masukan Nama Lengkap"
                            />
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email</label>  <span class="text-danger">*</span>
                            <input
                                type="email"
                                id="Editemail"
                                name="email"
                                class="form-control"
                                placeholder="Masukan Email"
                            />
                        </div>
                    </div>
                    <div class="row g-2 mb-3" >
                        <div class="col">
                            <label for="position_id" class="form-label">Posisi</label>  <span class="text-danger">*</span>
                            <input
                                class="form-control"
                                list="datalistPosition"
                                id="Editposition_id"
                                name="position_id"
                                placeholder="Type to search..."
                            />
                            <datalist id="EditdatalistPosition">
                                @foreach ($positions as $position)
                                    <option value="{{ $position->name }}"></option>
                                @endforeach

                            </datalist>
                        </div>
                        <div class="col">
                            <label for="phone" class="form-label">Nomor Telpon</label>  <span class="text-danger">*</span>
                            <input
                                type="text"
                                id="Editphone"
                                name="phone"
                                class="form-control"
                                placeholder="Enter Name"
                            />
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col mb-0">
                            <label for="ktp_number" class="form-label">Nomor KTP</label>  <span class="text-danger">*</span>
                            <input
                                type="text"
                                id="Editktp_number"
                                name="ktp_number"
                                class="form-control"
                                placeholder="Masukan Tempat Lahir"
                            />
                        </div>
                        <div class="col mb-0">
                            <label for="npwp_number" class="form-label">Nomor NPWP</label>
                            <input
                                type="text"
                                id="Editnpwp_number"
                                name="npwp_number"
                                class="form-control"
                                placeholder="Masukan Nomor NPWP"
                            />
                        </div>
                        <div class="col mb-0">
                            <label for="religion" class="form-label">Agama</label>  <span class="text-danger">*</span>
                            <input
                                class="form-control"
                                list="EditdatalistRegion"
                                id="Editreligion"
                                name="religion"
                                placeholder="Type to search..."
                            />
                            <datalist id="EditdatalistRegion">
                                @foreach ($religions as $religion)
                                    <option value="{{ $religion }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col mb-0">
                            <label for="status" class="form-label">Status</label>
                            <input
                                class="form-control"
                                list="datalistStatus"
                                id="Editstatus"
                                name="status"
                                placeholder="Type to search..."
                            />
                            <datalist id="datalistStatus">
                                <option value="AKTIF"></option>
                                <option value="TIDAK AKTIF"></option>
                            </datalist>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col mb-0">
                            <label for="place_of_birth" class="form-label">Tempat Lahir</label>  <span class="text-danger">*</span>
                            <input
                                type="text"
                                id="Editplace_of_birth"
                                name="place_of_birth"
                                class="form-control"
                                placeholder="Masukan Tempat Lahir"
                            />
                        </div>
                        <div class="col mb-0">
                            <label for="date_of_birth" class="form-label">Tanggal Lahir</label>  <span class="text-danger">*</span>
                            <input
                                type="date"
                                id="Editdate_of_birth"
                                name="date_of_birth"
                                class="form-control"
                                placeholder="DD / MM / YY"
                            />
                        </div>
                        <div class="col mb-0">
                            <label for="gender" class="form-label">Jenis Kelamin</label>  <span class="text-danger">*</span>
                            <input
                                class="form-control"
                                list="EditdatalistGender"
                                id="Editgender"
                                name="gender"
                                placeholder="Type to search..."
                            />
                            <datalist id="EditdatalistGender">
                                    <option value="LAKI"></option>
                                    <option value="PEREMPUAN"></option>
                                    <option value="OTHER"></option>
                            </datalist>
                        </div>
                        <div class="col mb-0">
                            <label for="zipcode" class="form-label">Kode Pos</label>  <span class="text-danger">*</span>
                            <input
                                type="text"
                                id="Editzipcode"
                                name="zipcode"
                                class="form-control"
                                placeholder="Masukan Kode Pos"
                            />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="address" class="form-label">Alamat</label>  <span class="text-danger">*</span>
                            <textarea
                                id="Editaddress"
                                name="address"
                                class="form-control"
                                placeholder="Masukan Alamat"
                            ></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
    </div>
