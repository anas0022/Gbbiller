@extends('supperadmin//layouts/app')

@section('title', 'Home Page')

@section('content')
    <script>
        var countryListUrl = "{{ route('country.list.get') }}";
    </script>
    <script src="{{ asset('js/superadmin/countrylist/country.js') }}"></script>
    <div class="content-body">



        <div class="container-fluid">



            <div class="row">

              {{--   @if(session('error'))
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
                @endif --}}
                
            @php
                $jsonPath = database_path('seeders\countrycites\countries_cities.json');
                $countries = json_decode(File::get($jsonPath), true);
            @endphp
                <div class="col-12">
                    <div class="card">
                        <div class="modal fade" id="add-item-model" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="add-country-form" method="POST" data-url="{{ route('country.post') }}">
                                            @csrf
                                        <input type="hidden" name="country_id" id="countryId" value="0">
                                        <div class="form-group">
                                            <label for="countryName">Country Name</label>
                                        <select name="country_name" id="country_name" class="form-control " data-search="true" >
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                            <option value="{{ $country['name'] }}">
                                                {{ $country['name'] }}
                                            </option>
                                        @endforeach
                                        </select>
                                            <span class="text-danger error-text countryName_error"></span>
                                        </div>
                                                
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="countryCode">Country Code</label>
                                                    <select name="country_code" id="country_code" class="form-control " data-search="true" >
                                                        <option value="">Select Country Code</option>
                                                        @foreach ($countries as $country)
                                                        <option value="{{ $country['iso3'] }}">
                                                            {{ $country['iso3'] }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                        <span class="text-danger error-text countryCode_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="mobileCode">Mobile Code</label>
                                                        <select name="mobile_code" id="mobile_code" class="form-control">
                                                            <option value="">Select Mobile Code</option>
                                                            @foreach ($countries as $country)
                                                            <option value="{{ $country['phonecode'] }}">
                                                                {{ '+' .  $country['phonecode'] }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                        <span class="text-danger error-text mobileCode_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="currencySymbol">Currency Symbol</label>
                                                        <select name="currency_symbol" id="currency_symbol" class="form-control">
                                                            <option value="">Select Currency Symbol</option>
                                                            @foreach ($countries as $country)
                                                            <option value="{{ $country['currency_symbol'] }}">
                                                                {{   $country['currency_symbol'] }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                        <span class="text-danger error-text currencySymbol_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                           {{--  <div class="form-group">
                                                <label for="methodDescription">Description</label>
                                                <textarea class="form-control" id="methodDescription"
                                                    name="methodDescription" rows="3"></textarea>
                                                <span class="text-danger error-text methodDescription_error"></span>
                                            </div> --}}
                                            <div class="modal-footer">
                                                <button type="submit" class="btn"
                                                    style="background: linear-gradient(45deg, #28a745, #007bff); color:white;" 
                                                  >
                                                    <i class="fas fa-save me-1"></i>Create Country
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <h4 class="card-text d-inline"> Country List </h4>
                            <div>

                                <a class="card-link float-end btn btn-rounded btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#add-item-model" onclick="deselect()"><span class="btn-icon-start text-info"><i
                                            class="fa fa-plus color-info"></i>
                                    </span>Add Country</a>

                            </div>

                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="width:100%;" class="countryTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Country Name</th>
                                            <th class="text-center">Country Code</th>
                                            <th class="text-center">Mobile Code</th>
                                            <th class="text-center">Currency Symbol</th>
                                            <th class="text-center">Created At</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody id="countryTableBody"></tbody>
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
    
    
    
</script>

<script>
    document.getElementById('country_name').addEventListener('change', function() {
        const selectedCountry = this.value;
        const countries = @json($countries); // Convert PHP array to JavaScript
        
        // Find the selected country data
        const countryData = countries.find(country => country.name === selectedCountry);
        
        if (countryData) {
            // Populate other select fields
            document.getElementById('country_code').value = countryData.iso3;
            document.getElementById('mobile_code').value = countryData.phonecode;
            document.getElementById('currency_symbol').value = countryData.currency_symbol;
        }
    });
</script>

@endsection