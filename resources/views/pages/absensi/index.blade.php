@extends('layout.body')

@section('title')
    <title>Absensi | Target Media Nusantara</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">List Absensi</h4>
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">List Karyawan </span> List Karyawan</h4> --}}

    <div class="card mb-4">
        <div class="card-body">
            <div class="row gx-3 gy-2 align-items-center">
                <div class="row">
                    <div class="demo-inline-spacing">
                        <a href="{{ route('export.excel') }}" type="button" class="btn btn-primary">Export Excel</a>
                        <a href="{{ route('export.pdf') }}" type="button" class="btn btn-primary">Export PDF</a>
                      </div>
                </div>
        </div>
            <div class="py-5">
                <div class="table-responsive text-nowrap">
                    <table class="cell-border compact stripe" id="absensi-datatable">
                        <thead class="table-light"  >
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
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
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>

{{-- @vite('resources/js/pages/datatable-absensi.js') --}}

<script>
    DatatableAbsensi('{!! route('absensi.datatable') !!}')
</script>

@endsection

