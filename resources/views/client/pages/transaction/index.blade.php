@extends('client.layouts.base')


@section('style')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection


@section('content')
<div class="col-md-6 offset-md-3">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title m-0">Transaction</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('transaction.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="trash-type">Trash Type</label>
                    <select class="form-control select2" style="width: 100%;" id="trash-type" name="trash_type">
                        <option selected disabled>-- Select Trash Type --</option>
                        @foreach($trashTypes as $type)
                            <option value="{{ $type->id }}" data-price="{{ $type->price_kg }}"
                                {{ (old('trash_type') === $type->id ? 'selected' : '') }}>
                                {{ "$type->type_name | " .currencyFormat($type->price_kg) ."/kg" }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="weight">Weight</label>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="weight" id="weight" min="1"
                            value="{{ old('weight') }}">
                        <div class="input-group-append">
                            <span class="input-group-text">Kg</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="total">Total</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control" id="total" readonly>
                        <input type="hidden" name="total" value="{{ old('total') }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection


@section('script')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
    $(function () {
        $('.select2').select2()

        const countTotal = () => {
            const weight = $('#weight').val();
            const price = $('#trash-type').find(':selected').data('price');
            const total = weight * price;

            const formattedCurrency = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(total);

            $('#total').val(formattedCurrency);
            $('[name="total"]').val(total);
        }

        $('#trash-type').change(function (e) {
            countTotal();
        });

        $('#weight').keyup(function (e) {
            countTotal();
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
