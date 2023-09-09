@extends('layout.body')

@section('title')
    <title>Karyawan | Deptech</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">List Karyawan</h4>
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">List Karyawan </span> List Karyawan</h4> --}}

    <div class="card mb-4">
        <div class="card-body">
            <div class="row gx-3 gy-2 align-items-center">
                    <div class="row">

                        <div class="col-md-2">
                                <button
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#karyawanModal"
                                class="btn btn-primary d-block">Tambah Karyawan</button>
                        </div>
                    </div>
            </div>
            <div class="py-5">
                <div class="table-responsive text-nowrap">
                    <table class="cell-border compact stripe"  id="karyawan-datatable">
                        <thead class="table-light"  >
                            <tr>
                                <th>No</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status Karyawan</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- / Content -->

@include('pages.karyawan.modal._add')
@include('pages.karyawan.modal._edit')

@endsection

@section('script')
<script src="{{ asset('js/helpers.js') }}"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>


<script>
    DatatableKaryawan('{!! route('karyawan.datatable') !!}')
</script>

{!! JsValidator::formRequest('App\Http\Requests\KaryawanRequest', '#saveKaryawan'); !!}
{!! JsValidator::formRequest('App\Http\Requests\KaryawanUpdateRequest', '#updateKaryawan'); !!}

@endsection

