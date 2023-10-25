@extends('admin.layouts.base')


@section('style')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection


@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Trash Type</h3>
    </div>
    <div class="card-body">
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
<!-- /.card -->
@endsection


@section('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
</script>

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
@endsection
