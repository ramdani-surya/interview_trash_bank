@extends('admin.layouts.base_auth')


@section('content')
<div class="col-md-6 offset-md-3">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title m-0">Login Administrator</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('auth.authenticate') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="{{ old('email') }}">

                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">

                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Log In</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection


@section('script')
<script>
    $(function () {
        $('#email').focus();
    });

</script>
@endsection
