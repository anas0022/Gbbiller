@extends('supperadmin//layouts/app')

@section('title', 'Home Page')

@section('content')
    <script>
        var methodListUrl = "{{ route('method.list') }}";
    </script>
    <script src="{{ asset('js/superadmin/methodlist/method.js') }}"></script>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Add Method</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="add-method-form" method="POST" data-url="{{ route('method.post') }}">
                                            @csrf
                                        <input type="hidden" name="methodId" id="methodId" value="0">
                                            <div class="form-group">
                                                <label for="methodName">Method Name</label>
                                                <input type="text" class="form-control" id="methodName" name="methodName"
                                                    >
                                                <span class="text-danger error-text methodName_error"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="methodName">Icon</label>
                                                <input type="file" class="form-control" id="methodIcon" name="methodIcon">
                                                <div class="img-preview">
                                                    <img src="" alt="Preview" id="imagePreview" style="max-width: 100px; max-height: 100px; object-fit: contain; margin-top: 10px;">
                                                </div>
                                                <span class="text-danger error-text methodIcon_error"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="methodDescription">Description</label>
                                                <textarea class="form-control" id="methodDescription"
                                                    name="methodDescription" rows="3"></textarea>
                                                <span class="text-danger error-text methodDescription_error"></span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn"
                                                    style="background: linear-gradient(45deg, #28a745, #007bff); color:white;" 
                                                  >
                                                    <i class="fas fa-save me-1"></i>Create Package
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <h4 class="card-text d-inline"> Method List </h4>
                            <div>

                                <a class="card-link float-end btn btn-rounded btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#add-item-model" onclick="deselect()"><span class="btn-icon-start text-info"><i
                                            class="fa fa-plus color-info"></i>
                                    </span>Add Method</a>

                            </div>

                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="width:100%;" class="methodTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Method</th>
                                            <th class="text-center">Icon</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody id="methodTableBody"></tbody>
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
    var methodListUrl = "{{ route('method.list') }}";
   
</script>


@endsection