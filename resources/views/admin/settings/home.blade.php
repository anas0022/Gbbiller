
@extends('admin//layouts/app')

@section('title', 'Home Page')
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
@section('content')

<div class="content-body">


@if(session('error'))
        <div class="toast error active" id="errorToast">
            <div class="toast-content">
                <i class="fas fa-solid fa-times error-icon"></i>
                <div class="message">
                    <span class="text text-1">Error</span>
                    <span class="text text-2">{{session('error')}}</span>
                </div>
            </div>
            <i class="fa-solid fa-xmark close" id="closeErrorToast"></i>
            <div class="progress error-progress active"></div>
        </div>
    @endif


    @if(session('success'))
        <div class="toast active" id="toast">
            <div class="toast-content">
                <i class="fas fa-solid fa-check check"></i>
                <div class="message">
                    <span class="text text-1">Success</span>
                    <span class="text text-2">{{session('success')}}</span>
                </div>
            </div>
            <i class="fa-solid fa-xmark close" id="closeToast"></i>
            <div class="progress active"></div>
        </div>
    @endif
 

    <div class="container-fluid">
       <div class="form-controll">
        <div class="row">
           

          <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">

                       <p>Core Settings </p>
                        <code>Wrong configuration may stop working of application</code>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" action="{{route('corepost')}}" method="POST" enctype="multipart/form-data">

                 
                            
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="nav flex-column nav-pills mb-3">
                                        <a href="#v-pills-home" data-bs-toggle="pill" class="nav-link show active">General</a>
                                        <a href="#v-pills-item" data-bs-toggle="pill" class="nav-link">Item</a>
                                        <a href="#v-pills-seo" data-bs-toggle="pill" class="nav-link">SEO</a>
                                        <a href="#v-pills-logo" data-bs-toggle="pill" class="nav-link">Logo </a>
                                        <a href="#v-pills-google" data-bs-toggle="pill" class="nav-link ">Google API</a>
                                        <a href="#v-pills-smtp" data-bs-toggle="pill" class="nav-link ">SMTP Settings </a>
                                        <a href="#v-pills-sms" data-bs-toggle="pill" class="nav-link ">SMS / OTP </a>
                                        <a href="#v-pills-payment" data-bs-toggle="pill" class="nav-link ">Payment Gateway </a>
                                        <a href="#v-pills-charge" data-bs-toggle="pill" class="nav-link ">Extra Charges</a>
                                        <a href="#v-pills-notification" data-bs-toggle="pill" class="nav-link ">Notification Settings </a>
                                        

                                    </div>
                                </div>
                             
                                
                            
                                <div class="col-sm-9">
                                    <div class="tab-content">
                                        <div id="v-pills-item" class="tab-pane fade">
                                          @include('admin/settings/item')
                                        </div>
                                        <div id="v-pills-home" class="tab-pane fade active show">

                                            @include('admin/settings/General')

                                        </div>


                                        <div id="v-pills-seo" class="tab-pane fade">

                                           @include('admin/settings/seo')


                                        </div>

                                        <div id="v-pills-logo" class="tab-pane fade">
                                            @include('admin/settings/logo')
                                        </div>
                                        <div id="v-pills-google" class="tab-pane fade ">
                                            @include('admin/settings/Googleapi')

                                        </div>
                                        <div id="v-pills-smtp" class="tab-pane fade ">
                                            @include('admin/settings/smtp')
                                            
                                        </div>
                                        <div id="v-pills-sms" class="tab-pane fade ">
                                           @include('admin/settings/smsotp')
                                        </div>
                                        <div id="v-pills-payment" class="tab-pane fade ">
                                           @include('admin/settings/paymentgate');
                                        </div>
                                        <div id="v-pills-charge" class="tab-pane fade ">
                                           @include('admin/settings/extracharge')

                                        </div>
                                        <div id="v-pills-notification" class="tab-pane fade ">
                                        @include('admin/settings/notificationsettings')
                                         </div>
                                      
                                    </div>

                                </div>
                              
                        </form>
                    </div>
        

                </div>

            </div>
            </div>
            </div>
            </div>
</div>

@endsection