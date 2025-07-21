@extends('supperadmin//layouts/app')

@section('title', 'Home Page')

@section('content')
    <script>
        var userListUrl = "{{ route('user.list') }}";
    </script>
    <script src="{{ asset('js/superadmin/userlist/userlist.js') }}"></script>
    <div class="content-body">



        <div class="container-fluid">



            <div class="row">

                @if(session('error'))
                    <script>
                        swal({
                            title: "error!",
                            text: "{{ session('error') }}",
                            icon: "error",
                            type: "error"
                        });
                    </script>
                @endif
                @if(session('success'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "{{ session('success') }}",
                            icon: "success",
                            type: "success"
                        });
                    </script>
                @endif
                <div class="col-12">
                    <div class="card">
                        <div class="modal fade" id="add-item-model" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form data-url="{{ route('user.post') }}" method="post" enctype="multipart/form-data" id="add-user-form">
    @csrf
    <input type="hidden" name="id" value="" id="id">

    <div class="card-body">
        <div class="col-lg-12 mx-auto">
            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Name</label>
                    <input name="name" type="text" class="form-control">
                    <span class="text-danger error-text name_error"></span>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Username</label>
                    <input name="username" type="text" class="form-control">
                    <span class="text-danger error-text username_error"></span>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Email</label>
                    <input name="email" type="email" class="form-control">
                    <span class="text-danger error-text email_error"></span>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Mobile</label>
                    <input name="mobile" type="text" class="form-control">
                    <span class="text-danger error-text mobile_error"></span>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Country</label>
                    <select name="country_code" class="form-control selectpicker" data-live-search="true">
                        @foreach ($country as $a)
                            <option value="{{ $a->id }}">{{ $a->country_name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger error-text country_code_error"></span>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Plan</label>
                    <select name="plan" class="form-control selectpicker">
                        <option value="">-select-</option>
                        @foreach ($subscription as $sub)
                            <option value="{{ $sub->id }}">{{ $sub->method->method }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger error-text plan_error"></span>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Password</label>
                    <input name="password" type="password" class="form-control">
                    <span class="text-danger error-text password_error"></span>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control">
                    <span class="text-danger error-text password_confirmation_error"></span>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Profile Picture</label>
                    <input name="image" type="file" class="form-control">
                    <small class="text-danger">Max Width/Height: 500px * 500px</small>
                    <span class="text-danger error-text image_error"></span>
                </div>

            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary" style="background: linear-gradient(45deg, #28a745, #007bff);">
                <i class="fas fa-save me-1"></i> Save
            </button>
        </div>
    </div>
</form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <h4 class="card-text d-inline"> User List </h4>
                            <div>

                                <a class="card-link float-end btn btn-rounded btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#add-item-model" onclick="delete()"><span class="btn-icon-start text-info"><i
                                            class="fa fa-plus color-info"></i>
                                    </span>Add User</a>

                            </div>

                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="width:100%;" class="methodTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Plan</th>
                                            <th class="text-center">Mobile</th>
                                    
                                   <!--          <th class="text-center">Role</th> -->
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody id="userTableBody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
<!-- Add this before your script include -->
<script>
    var userListUrl = "{{ route('user.list') }}";
   
</script>


@endsection