@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Category</h1>
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
            <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="put" id="categoryForm"
                name="categoryForm">

                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name" value="{{ $category->name }}">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control"
                                        placeholder="Slug" value="{{ $category->slug }}">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{ $category->status == 1 ? 'selected' : '' }}" value="1">Active
                                        </option>
                                        <option {{ $category->status == 0 ? 'selected' : '' }} value="0">Block
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
        </div>
        </form>
    </section>
@endsection

@section('customJs')
    <script>
        console.log("Before AJAX request");
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var form = $("#categoryForm");

            $("#name").on('input', function () {
                // Check if the slug field is empty before triggering the AJAX call
                if ($("#slug").val() === "") {
                    $.ajax({
                        url: '{{ route('getSlug') }}',
                        type: 'get',
                        data: form.serializeArray(),
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === true) {
                                $("#slug").val(response.slug);
                            }
                        }
                    });
                }
            });

            form.submit(function (event) {
                event.preventDefault();
                var formData = form.serialize();
                console.log("Serialized Form Data:", formData);

                $("button[type=submit]").prop('disabled', true);

                $.ajax({
                    url: '{{ route('categories.update', $category->id) }}',
                    type: 'put',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        console.log("AJAX Success:", response);

                        if (response.status === true) {
                            // Handle success, for example, redirecting to another page
                            window.location.href = '{{ route('categories.index') }}';
                        } else {
                            // Handle validation errors
                            $.each(response.errors, function (key, value) {
                                $("#" + key).addClass('is-invalid').siblings('p')
                                    .addClass('invalid-feedback').html(value);
                            });
                        }
                    },
                    error: function (jqXHR, exception) {
                        console.log("Something went wrong");
                    },
                    complete: function () {
                        // Enable the button whether the request is successful or not
                        $("button[type=submit]").prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
