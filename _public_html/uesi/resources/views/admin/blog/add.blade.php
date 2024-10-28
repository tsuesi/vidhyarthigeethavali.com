@extends('admin.layouts.app')

@section('content')

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-country">Blog</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                                <li class="breadcrumb-item">Add</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        {{--                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Add') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('blog.store') }}"  autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <h6 class="heading-small text-muted mb-4">{{ __('Add Blog ') }}</h6>


                            <div class="pl-lg-4 row">
                                <div class="col-md-6 form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="title">{{ __('Blog Title') }}</label>
                                    <input type="text" name="title" id="title" class="blogTitle form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Blog Title') }}" value="{{ old('title', '') }}" autofocus required onkeyup="onBlogTitle()">

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                              </div>

                              <div class="chatGPTButton mx-3 mb-4 d-none">
                                <button class="btn-chatgpt btn btn-md btn-dark" onclick="getContentFromChatGPT()"><i class="fas fa-robot"></i>  Get Content From ChatGPT</button>
                              </div>

                              <div class="pl-lg-4 row">
                                  <div class="col-md-6 form-group{{ $errors->has('short_description') ? ' has-danger' : '' }}">
                                      <label class="form-control-label" for="short_description">{{ __('Blog Short Description') }}</label>
                                      <textarea name="short_description"  rows="4" cols="80" class="short_description" ></textarea>
                                      @if ($errors->has('short_description'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('short_description') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                            </div>

                                <div class="pl-lg-4 row">
                                 <div class="col-md-6 form-group">
                                     <label for="example-text-input" class="col-form-label">Blog Image</label>
                                     <br>
                                     <input type="file" name="image"/>

                                         @if ($errors->has('image'))
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('image') }}</strong>
                                             </span>
                                         @endif
                                   </div>
                                </div>
                              <div class="pl-lg-4 row">
                                  <div class="col-md-6 form-group">
                                    <label class="form-control-label" for="input-name">{{ __('Blog Description') }}</label>
                                    <textarea name="description" id="editor" class="ckeditor form-control" placeholder="{{ __('Blog Description') }}" value="{{ old('description','') }}">{!! old('description','') !!}</textarea>
                                  </div>
                            </div>

                            <div class="pl-lg-4 row">

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    <a href="{{ route('blog') }}" type="button" class="btn btn-danger mt-4">{{ __('Cancel') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
<script src="//cdn.ckeditor.com/4.4.7/standard-all/ckeditor.js"></script>
<script src="http://cdn.ckeditor.com/4.4.7/standard-all/adapters/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  $('.ckeditor').ckeditor();
});

//chatGPT stuff
<?php  if(isset($chatGPT) && $chatGPT->enable)  { ?>
  function onBlogTitle() {
    if (this.timer) {
        window.clearTimeout(this.timer);
    }
    this.timer = window.setTimeout(function() {
      promoteChatGPT()
    }, 1000);
  }

  function promoteChatGPT(language) {
      if($('.blogTitle').val().length > 3) {
          $('.chatGPTButton').removeClass('d-none')
      }
      else {
          $('.chatGPTButton').addClass('d-none')
      }
  }

  //get content from chat GPT
  function getContentFromChatGPT() {
      let keyword = $('.blogTitle').val();

      $(".btn-chatgpt").attr("disabled", true);

      $('.btn-chatgpt').html(`<img src="{{asset('frontend/images')}}/artificial-intelligence.gif" height="50" />
          <p classs=" font-weight-600 ">Please Wait...</p>
      `)

      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       $.ajax({
         url: "{{route('get-content-from-chatGPT')}}",
         type: 'post',
         data:{'keyword' :keyword,'type' : 'blog' ,'_token': CSRF_TOKEN},
         success: function (response) {
              $(".btn-chatgpt").removeAttr("disabled", true);
              $('.btn-chatgpt').html(`<i class="fas fa-robot"></i> Get Content From ChatGPT`);
              //set short description
              $('.short_description').val(response.short_desc)
              //set description
              CKEDITOR.instances['editor'].insertHtml(response.long_desc)
            }
        })
      }


<?php } ?>
</script>

@endpush
