<form action="{{ route('karyawan.store') }}" id="updateKaryawan" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="modalFullTitle">Tambah Karyawan</h5>
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
                <label for="fullname" class="form-label">Nama Lengkap</label>
                <input
                    type="text"
                    id="fullname"
                    name="fullname"
                    class="form-control"
                    placeholder="Masukan Nama Lengkap"
                />
            </div>
            <div class="col">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukan Email"
                />
            </div>
        </div>
        <div class="row g-2 mb-3" >
            <div class="col">
                <label for="position_id" class="form-label">Posisi</label>
                <input
                    class="form-control"
                    list="datalistPosition"
                    id="position_id"
                    name="position_id"
                    placeholder="Type to search..."
                />
                <datalist id="datalistPosition">
                    @foreach ($positions as $position)
                        <option value="{{ $position->name }}"></option>
                    @endforeach

                </datalist>
            </div>
            <div class="col">
                <label for="phone" class="form-label">Nomor Telpon</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    class="form-control"
                    placeholder="Enter Name"
                />
            </div>
        </div>
        <div class="row g-2 mb-3">
            <div class="col mb-0">
                <label for="ktp_number" class="form-label">Nomor KTP</label>
                <input
                    type="text"
                    id="ktp_number"
                    name="ktp_number"
                    class="form-control"
                    placeholder="Masukan Tempat Lahir"
                />
            </div>
            <div class="col mb-0">
                <label for="npwp_number" class="form-label">Nomor NPWP</label>
                <input
                    type="text"
                    id="npwp_number"
                    name="npwp_number"
                    class="form-control"
                    placeholder="Masukan Nomor NPWP"
                />
            </div>
            <div class="col mb-0">
                <label for="religion" class="form-label">Agama</label>
                <input
                    class="form-control"
                    list="datalistRegion"
                    id="religion"
                    name="religion"
                    placeholder="Type to search..."
                />
                <datalist id="datalistRegion">
                    @foreach ($religions as $religion)
                        <option value="{{ $religion }}"></option>
                    @endforeach
                </datalist>
            </div>

        </div>
        <div class="row g-2 mb-3">
            <div class="col mb-0">
                <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                <input
                    type="text"
                    id="place_of_birth"
                    name="place_of_birth"
                    class="form-control"
                    placeholder="Masukan Tempat Lahir"
                />
            </div>
            <div class="col mb-0">
                <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                <input
                    type="date"
                    id="date_of_birth"
                    name="date_of_birth"
                    class="form-control"
                    placeholder="DD / MM / YY"
                />
            </div>
            <div class="col mb-0">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <input
                    class="form-control"
                    list="datalistGender"
                    id="gender"
                    name="gender"
                    placeholder="Type to search..."
                />
                <datalist id="datalistGender">
                        <option value="LAKI"></option>
                        <option value="PEREMPUAN"></option>
                        <option value="OTHER"></option>
                </datalist>
            </div>
            <div class="col mb-0">
                <label for="zipcode" class="form-label">Kode Pos</label>
                <input
                    type="text"
                    id="zipcode"
                    name="zipcode"
                    class="form-control"
                    placeholder="Masukan Kode Pos"
                />
            </div>
        </div>
        <div class="row g-2">
            <div class="col mb-0">
                <label for="address" class="form-label">Alamat</label>
                <textarea
                    id="address"
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
