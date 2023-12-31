    @extends('admin.layouts.app')

    @section('content')
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Category</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('categories.store') }}" method="post" id="categoryForm" name="categoryForm">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Name">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control"
                                            placeholder="Slug">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Block</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-5 pt-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
            </div>
            </form>
        </section>
    @endsection

    @section('customJs')
        <script>
            $(document).ready(function() {
                $("#categoryForm").submit(function(event) {
                    event.preventDefault();

                    var form = $(this);

                    $.ajax({
                        url: form.attr('action'),
                        type: 'post',
                        data: form.serialize(),
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === true) {
                                // Handle success, for example, redirecting to another page
                                window.location.href = '{{ route('categories.index') }}';
                            } else {
                                // Handle validation errors
                                $.each(response.errors, function(key, value) {
                                    $("#" + key).addClass('is-invalid').siblings('p')
                                        .addClass('invalid-feedback').html(value);
                                });
                            }
                        },
                        error: function(jqXHR, exception) {
                            console.log("Something went wrong");
                        }
                    });
                });

                $("#name").change(function() {
                    var element = $(this);

                    $.ajax({
                        url: '{{ route('getSlug') }}',
                        type: 'get',
                        data: element.serialize(),
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === true) {
                                $("#slug").val(response.slug);
                            }
                        }
                    });
                });
            });
        </script>
    @endsection
