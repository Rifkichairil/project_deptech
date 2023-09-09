@extends('layout.body')

@section('title')
    <title>Karyawan | Deptech</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Detail Karyawan</h4>
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">List Karyawan </span> List Karyawan</h4> --}}

    <div class="card mb-4">
        <div class="card-body">
        <!-- Account -->
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Nama Lengkap</label>
                    <h6 class="mb-0 text-muted">{{ $data->personal->fullname }}</h6>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Email</label>
                    <h6 class="mb-0 text-muted">{{ $data->email }}</h6>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Posisi</label>
                    <h6 class="mb-0 text-muted">{{ $data->position->name }}</h6>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="organization" class="form-label">Nomor Telpon</label>
                    <h6 class="mb-0 text-muted">{{ $data->phone }}</h6>
                </div>
                {{-- ini --}}
                <div class="mb-3 col-md-4">
                    <label for="organization" class="form-label">Nomor KTP</label>
                    <h6 class="mb-0 text-muted">{{ $data->identity->ktp_number }}</h6>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="organization" class="form-label">Nomor NPWP</label>
                    <h6 class="mb-0 text-muted">{{ $data->identity->npwp_number }}</h6>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="organization" class="form-label">Agama</label>
                    <h6 class="mb-0 text-muted">{{ $data->personal->religion }}</h6>
                </div>
                {{-- ini --}}
                <div class="mb-3 col-md-4">
                    <label for="organization" class="form-label">Tempat Lahir</label>
                    <h6 class="mb-0 text-muted">{{ $data->personal->place_of_birth }}</h6>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="organization" class="form-label">Tanggal Lahir</label>
                    <h6 class="mb-0 text-muted">{{ $data->personal->date_of_birth }}</h6>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="organization" class="form-label">Jenis Kelamin</label>
                    <h6 class="mb-0 text-muted">{{ $data->personal->gender }}</h6>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="organization" class="form-label">Kode Pos</label>
                    <h6 class="mb-0 text-muted">{{ $data->personal->zipcode }}</h6>
                </div>
                <div class="mb-3">
                    <label for="organization" class="form-label">Alamat</label>
                    <h6 class="mb-0 text-muted">{{ $data->personal->address }}</h6>
                </div>
              </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="py-5">
                <div class="table-responsive text-nowrap">
                    <table class="cell-border compact stripe" id="detail-karyawan-datatable">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Absen</th>
                                <th>Tipe</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->


@endsection
@section('script')
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
<script>
    DatatableKaryawanDetail('{!! route('karyawan.datatableAbsen', $data->id) !!}');
</script>

@endsection

