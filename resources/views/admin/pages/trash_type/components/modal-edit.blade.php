<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit {{ $pageTitle }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="type-name">Type Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="type_name" id="type-name">

                        @error('type_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Price <span class="text-danger">*</span></label>

                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="price" id="price" min="1">

                            <div class="input-group-append">
                                <span class="input-group-text">/kg</span>
                            </div>
                        </div>

                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>

                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">

                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

<script>
    $(function () {
        $('.btn-edit').click(function (e) {
            const data = $(this).data();

            $('#modal-edit form').attr('action', data.url);
            $('#modal-edit #type-name').val(data.name);
            $('#modal-edit #price').val(data.price);
            $('#modal-edit #description').text(data.description);
        });
    });

</script>
