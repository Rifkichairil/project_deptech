<!-- Modal -->
<div class="modal fade" id="editModalAdmin" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalFullTitle">Tambah Admin</h5>
            <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            ></button>
        </div>
        <form action="{{ route('user-admin.store') }}" id="editAdmin" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row g-2 mb-3" >
                    <div class="col">
                        <label for="first_name" class="form-label">Nama Depan</label>   <span class="text-danger">*</span>
                        <input
                            type="text"
                            id="edit_first_name"
                            name="first_name"
                            class="form-control"
                            placeholder="Masukan Nama Depan"
                            required
                        />
                    </div>
                    <div class="col">
                        <label for="last_name" class="form-label">Nama Belakang</label>   <span class="text-danger">*</span>
                        <input
                            type="text"
                            id="edit_last_name"
                            name="last_name"
                            class="form-control"
                            placeholder="Masukan Nama Depan"
                            required
                        />
                    </div>
                    <div class="col">
                        <label for="email" class="form-label">Email</label>   <span class="text-danger">*</span>
                        <input
                            type="email"
                            id="edit_email"
                            name="email"
                            class="form-control"
                            placeholder="Masukan Email"
                            required
                        />
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
