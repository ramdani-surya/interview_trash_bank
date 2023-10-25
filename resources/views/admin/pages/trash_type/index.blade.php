@extends('admin.layouts.base')


@section('style')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection


@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ "$pageTitle List" }}</h3>
    </div>

    <div class="card-body">
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-add">
            Add New
        </button>

        <table id="myDatatable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Trash Type Name</th>
                    <th>Description</th>
                    <th>Price/kg</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trashTypes as $type)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ $type->image }}" alt="" width="100px"></td>
                        <td>{{ $type->type_name }}</td>
                        <td>{{ $type->description }}</td>
                        <td>{{ currencyFormat($type->price_kg) . ' /kg' }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

@include('admin.pages.trash_type.components.modal-add', ['pageTitle' => $pageTitle])

@endsection


@section('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
</script>

<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
    $(function () {
        $('#myDatatable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>

@if(session('success') || session('error'))
    @php
        $sessionType = session('success') ? 'success' : 'error';
        $sessionMessage = session('success') ?? session('error');
    @endphp

    <script>
        $(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                icon: '{{ $sessionType }}',
                title: '{{ $sessionMessage }}'
            })
        });
    </script>
@endif

@endsection
