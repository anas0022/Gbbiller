@extends('supperadmin//layouts/app')

@section('title', 'Home Page')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <form  method="post" id="add-subscription-form" data-url="{{route('subsciption.post')}}">
                @csrf   
             {{--    <input type="text" name="sub_id" id="sub_id" value=""> --}}
                <div class="card">
                    <div class="card-header">
                        Create Subscription Package
                        
                    </div>
                   
                    <div class="card-body">
                        <div class="col-lg-12 mx-auto">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold">Package Type<span class="text-danger">*</span></label>
                                    <select name="subtype" class="form-control selectpicker">
                                        <option value="">Choose package type</option>
                                        @foreach ($method as $m)
                                            <option value="{{$m->id}}"> {{$m->method}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text subtype_error"></span>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold">Validity Period<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" name="duration" class="form-control" >
                                        <span class="input-group-text">Days</span>
                                    </div>
                                    <span class="text-danger error-text duration_error"></span>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold">Store Limit<span class="text-danger">*</span></label>
                                    <input name="store_limit" type="number" class="form-control">
                                    <span class="text-danger error-text store_limit_error"></span>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold">Package Rate<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input name="price" type="number" step="0.01" class="form-control">
                                    </div>
                                    <span class="text-danger error-text price_error"></span>
                                </div>

                                <div class="col-12 mb-4">
                                    <label class="form-label fw-bold">Access Control<span class="text-danger">*</span></label>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input name="executive" class="form-check-input" value="1" type="checkbox" id="execApp">
                                            <label class="form-check-label" for="execApp">Sales Executive</label>
                                        </div>
                                        <div class="form-check">
                                            <input name="dealer" class="form-check-input" value="2" type="checkbox" id="dealerApp">
                                            <label class="form-check-label" for="dealerApp">Dealers</label>
                                        </div>
                                        <div class="form-check">
                                            <input name="customer" class="form-check-input" value="3" type="checkbox" id="customerApp">
                                            <label class="form-check-label" for="customerApp">Customers</label>
                                        </div>
                                    </div>
                                    <span class="error-text"></span>
                                </div>

                                <div class="col-12 mb-4">
                                    <label class="form-label fw-bold">Additional Notes</label>
                                    <textarea name="note" class="form-control" rows="3" placeholder="Enter any additional information about this subscription package"></textarea>
                                  
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                          
                            <button type="submit" class="btn" style="background: linear-gradient(45deg, #28a745, #007bff); color:white;"><i class="fas fa-save me-1"></i>Create Package</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/superadmin/sublist/sublist.js')}}"></script>

@endsection