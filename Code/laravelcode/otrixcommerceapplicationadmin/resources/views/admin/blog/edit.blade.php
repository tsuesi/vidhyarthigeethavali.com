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
                            <h3 class="mb-0">{{ __('Update') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('blog.update',['id' => $data->id ]) }}"  autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            
                            <div class="pl-lg-4 row">
                            <div class="col-md-6  form-group">
                                <label for="example-text-input" class="col-form-label">Blog Image</label>
                                <br>
                                <img src="{{asset('uploads/blog').'/'.$data->image}}" alt="" height="200" width="200">
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
                                <div class="col-md-6 form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="title">{{ __('Blog Title') }}</label>
                                    <input type="text" name="title" id="title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Blog Title') }}" value="{{ old('title', $data->title ) }}" autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                              </div>

                              <div class="pl-lg-4 row">
                                  <div class="col-md-6 form-group{{ $errors->has('short_description') ? ' has-danger' : '' }}">
                                      <label class="form-control-label" for="short_description">{{ __('Blog Short Description') }}</label>
                                      <textarea name="short_description" rows="4" cols="80" >{{$data->short_description }}</textarea>
                                      @if ($errors->has('short_description'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('short_description') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                            </div>


                              <div class="pl-lg-4 row">
                                <div class="col-md-6  form-group">
                                                      <label class="form-control-label" for="input-name">{{ __('Blog Description') }}</label>
                                                      <textarea name="description" id="description" class="ckeditor form-control" placeholder="{{ __('Blog Description') }}" value="{{ old('description','') }}">{!! old('description',$data->description) !!}</textarea>
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
</script>

@endpush
