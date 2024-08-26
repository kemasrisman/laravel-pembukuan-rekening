@extends('admin.layouts.master')
@section('title', 'Approval Pembukaan Rekening')
{{-- Content body: main page content --}}

@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Approval Pembukaan Rekening</li>
    </ol>
</nav>
@stop

@section('content')

<div class="card mt-4">
    <div class="card-header">
        <h2 class="card-title">Daftar Approval Pembukaan Rekening</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Tempat Lahir</th>
                    <th>Status</th>
                    @can('nasabah.approve')
                    <th width="100px">Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>



@stop

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{ route('nasabah.approve') }}" method="POST">
      <div class="modal-body">
            @csrf
            <input type="hidden" name="id_nasabah" id="id_nasabah">
            Apakah anda yakin akan menyetujui pembukaan rekening nasabah ini?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-success">Approve</button>
        </div>
    </form>
    </div>
  </div>
</div>




{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="/vendor/toastr/toastr.css" rel="stylesheet"/>
@endpush

{{-- Push extra scripts --}}

@push('js')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="/vendor/toastr/toastr.min.js"></script>
<script type="text/javascript">
    $(function () {

    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    // Datatables
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('nasabah.list') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama', name: 'nama'},
              {data: 'tempat_lahir', name: 'tempat_lahir'},
              {data: 'status', name: 'status'},
              @can('nasabah.approve')
              {data: 'action', name: 'action', orderable: false, searchable: false},
              @endcan
          ],
          order: [[0, 'asc']]
      });

        // Approve Nasabah
        $('body').on('click', '.approve', function () {
            var nasabah_id = $(this).data("id-nasabah");
            console.log(nasabah_id);
            $('#id_nasabah').val(nasabah_id);
        });
          
    });
  </script>
@endpush