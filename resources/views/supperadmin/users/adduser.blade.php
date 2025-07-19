@extends('supperadmin//layouts/app')

@section('title', 'Home Page')

@section('content')
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
<div class="content-body">

    @if($errors->any())
    <script>
        swal({
            title: "Error!",
            text: "{!! implode('\n', $errors->all()) !!}",
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
    <div class="container-fluid">


        <div class="row">

          
                <div class="col-12">
                    <form action="{{route('user.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Create User</h4>
                                <small>Enter User Information</small>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12 mx-auto">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Name<span class="text-danger">*</span></label>
                                            <input name="name" type="text" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Email</label>
                                            <input name="email" type="email" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Mobile<span class="text-danger">*</span></label>
                                            <div class="input-group" style="gap:2px;">
                                                <div class="small col-sm-2" >
                                                <select name="country_code" class="form-control selectpicker"  data-live-search="true" >
                                                    @foreach ($country as $a)
                                                    <option value="{{$a->mobile_code}}">{{$a->mobile_code}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                <input name="mobile" type="text" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Plan</label>
                                            <select name="plan" class="form-control selectpicker">
                                                <option value="">-select-</option>
                                                @foreach ($subscription as $sub)
                                                <option value="{{$sub->id}}">{{$method->firstWhere('id',$sub->type)->method}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Password<span class="text-danger">*</span></label>
                                            <input name="password" type="password" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Confirm Password<span class="text-danger">*</span></label>
                                            <input name="password_confirmation" type="password" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Profile Picture</label>
                                            <input name="image" type="file" class="form-control">
                                            <small class="text-danger">Max Width/Height: 500px * 500px</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary" style="background: linear-gradient(45deg, #28a745, #007bff);"><i class="fas fa-save me-1"></i>Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
 

         
        </div>

    </div>
</div>



<script>
function rolechange() {
    var select = document.getElementById('roleselect');
    var selectedOption = select.options[select.selectedIndex];
    var roleName = selectedOption.getAttribute('data-name');
    document.getElementById('roleinput').value = roleName;
}
</script>

@endsection