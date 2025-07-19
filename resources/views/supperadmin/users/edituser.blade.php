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
                    <form action="{{route('edit.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" value="{{$items->id}}" name="id">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-text d-inline"> Edit User </h4>
                                <p>Enter User Information</p>
                            </div>
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-6">

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input name="name" type="text" class="form-control form-control-sm" required value="{{$items->name}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Mobile</label>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <select name="country_code" id="country_code" class="form-control form-control-sm selectpicker" data-live-search="true">

                                                            @foreach ($country as $a)
                                                            <option value="{{$a->mobile_code}}">{{$a->mobile_code}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="mobile" type="text" class="form-control form-control-sm" required value="{{$items->mobile}}">
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input name="email" type="email" class="form-control form-control-sm" value="{{$items->email}}">
                                            </div>
                                        </div>
                      
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Plan</label>
                                            <div class="col-sm-9">
                                                <select name="plan" id="" class="form-control">
                                                    <option value="">-select-</option>
                                                    @foreach ($subscriptions as $sub)
                                                     <option value="{{$sub->id}}" {{ $sub->type == $subscription_type->id ? 'selected' : '' }}>{{$method->firstWhere('id',$sub->type)->method}}</option>
                                                    @endforeach
                                                 </select>
                                            </div>
                                        </div>
                                        

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input name="password" type="password" class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                                            <div class="col-sm-9">
                                                <input name="password_confirmation" type="password" class="form-control form-control-sm" required>
                                            </div>
                                        </div>


                                       

                                    </div>
                                    <div class="col-6">


                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Profile Picture</label>
                                            <div class="col-sm-9">
                                                <input name="image" type="file" class="form-control">
                                                <span id="logo_msg" style="display:block;" class="text-danger">Max Width/Height: 500px * 500px </span>
                                            </div>
                                        </div>

                                    </div>

                                    
                                </div>

                            </div>
                            <div class="card-header">

                                <button name="save" type="submit" class="btn btn-primary">Save</button>
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