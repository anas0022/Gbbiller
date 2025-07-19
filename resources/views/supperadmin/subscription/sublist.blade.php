@extends('supperadmin//layouts/app')

@section('title', 'Home Page')

@section('content')
<script src="{{asset('js/superadmin/sublist/sublist.js')}}"></script>



<div class="content-body">
    
    <div class="container-fluid">



        <div class="row">
            
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Sub List </h4>
                        <div>
                        
                            <a href="{{route('subsciptionadd')}}" class="card-link float-end btn btn-rounded btn-info btn-sm "><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Make Subscription</a>
                          
                        </div>
                     
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%;" class="methodTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                  
                                    
                                        <th class="text-center">Method</th>
                                        <th class="text-center">Store Count</th>
                                        <th class="text-center">Duration</th>
                                        <th class="text-center">Rate</th>
                                        
                                       
                                        <th class="text-center">Created on</th>                                                                          
                                   <!--      <th>Status</th>     -->                                    
                                        <th class="text-center"><i class="fas fa-cog"></i></th>
                                    </tr>
                                    <tbody id="methodTableBody"></tbody>
                                </thead>
                              
                          </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<script>
    var subListUrl = "{{ route('subscription.data') }}";
    var subedit = "{{ route('subscription.edit', ':id') }}";
</script>
@endsection
