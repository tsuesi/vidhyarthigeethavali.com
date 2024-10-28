@extends('admin.layouts.app')

@section('content')

    <div class="header bg-primary pb-3">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-0"> AI Image Similarity</h6>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
      <div class="row  ">
          <div class="col">
            <div class="card p-3">
              <h4>Your APP ID: <b>{{$response['ID']}}</b>  </h4>
              <h4>Available Tokens: <b>{{$response['limit']}}</b>  </h4>
              <h4>Dataset Uploaded: <b>@if($response['datasetExists']) Yes @else No @endif</b>  </h4>
              <h4>Daily Limit: <b >@if(isset($response['dailyLimit'])) {{$response['dailyLimit']}} @else 10 @endif</b>  </h4>
                @if(!empty($response['buyMore']))
                  <h4>Buy More Tokens: <b > <a href="{{$response['buyMore']}}" target="_blank">Purchase Tokens</a> </b>  </h4>
                @endif
                @if(!empty($response['notification']))
                  <h4 >Important Message: <b class="text-warning"> {{$response['notification']}} </b>  </h4>
                @endif
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row  ">
          <div class="col">
            <div class="card p-3">
              <h4 class="text-center">Upload/Update your dataset now</h4>
              <p class="font-weight-bold">What is Dataset?</p>
              <p class="font-weight-bold"><strong>Dataset is collection of your products images</strong>
                We will use your dataset collection to perfome image search to make the image search workable you need to upload your products images so we can perfome image search.</p>
            <center>
              <button onclick="prepareZip()" class="btn btn-primary btn-upload text-white"><i class="fa fa-upload"></i> Upload Your Databaset Now</button>
              <p class="font-weight-bold my-3 text-success zip-message"></p>
              <p class="font-weight-bold my-3 text-danger zip-error"></p>
              <div class="d-none uploading-dataset">
                <div class="d-flex justify-content-center align-items-center ">
                  <img src="{{asset('frontend/images/uploading.gif')}}" alt="" height="30">
                  <span class="mx-2 font-weight-600">Uploading your dataset please wait...</span>
                </div>
              </div>
              <div class="d-none upload-success">
                <div class="d-flex justify-content-center align-items-center ">
                  <img src="{{asset('frontend/images/like.gif')}}" alt="" height="30">
                  <span class="mx-2 font-weight-600 text-dark">Dataset successfully uploaded it may take upto 25 minutes to effect in search result depends on your dataset size</span>
                </div>
              </div>
              <div class="d-none upload-fail">
                <div class="d-flex justify-content-center align-items-center ">
                  <img src="{{asset('frontend/images/fail.gif')}}" alt="" height="60">
                  <span class="mx-2 font-weight-600 text-danger failedTxt">Upload failed try again later</span>
                </div>
              </div>

            </center>
        </div>
      </div>
    </div>
  </div>

    <!-- Page content -->



@endsection

@push('js')
  <script>

    function prepareZip() {
      $(".btn-upload").attr("disabled", true);
      $('.upload-fail').addClass('d-none');
      $('.upload-success').addClass('d-none');
      $('.zip-message').text('Please Wait Prepering Zip...');
      $('.zip-error').text('');
      $.ajax({
          url: "{{route('create-products-zip')}}",
          processData: false,
          contentType: false,
          type: 'get',
          success: function (response) {
            if(response.status == 1){
              $('.zip-message').text('');
              $('.uploading-message').text('');
              $('.uploading-dataset').removeClass('d-none');
              uploadToAI();
            }
            else {
              $('.zip-message').text('');
              $('.uploading-message').text('');
              $('.zip-error').text(response.message);
            }

          }
      })
    }

    function uploadToAI() {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
          url: "{{route('upload-products-zip')}}",
          type: 'post',
          dataType: 'JSON',
          data:{'appID' : "{{$response['ID']}}",'_token': CSRF_TOKEN},
          success: function (response) {
            $('.uploading-dataset').addClass('d-none');
            if(response.status == 1) {
                $('.upload-success').removeClass('d-none');
                settingUpModel();
            }
            else {
                $('.upload-fail').removeClass('d-none');
                $('.failedTxt').text(response.message);
                $(".btn-upload").removeAttr("disabled", true);
            }

          }
      })
    }

    //call setting up model after upload latest zip
    function settingUpModel() {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
          url: "{{route('setting-up-model')}}",
          type: 'post',
          dataType: 'JSON',
          data:{'appID' : "{{$response['ID']}}",'_token': CSRF_TOKEN},
          success: function (response) {
            $(".btn-upload").removeAttr("disabled", true);
          }
      })
    }

    </script>
@endpush
