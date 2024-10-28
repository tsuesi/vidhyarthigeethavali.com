<div class="tab-pane active" id="tab-general">
    <ul class="language nav nav-tabs  mb-5" id="languageTab" role="tablist">
      @foreach($data['data']->productMultipleDescription as $key=>$language)
        <li class="nav-item">
          <a class="nav-link  @if($key == 0) text-primary font-weight-bold text-lg active @endif" id="language-tab{{$language->id}}" data-toggle="tab" href="#language{{$language->id}}" role="tab" aria-controls="{{$language->language_name}}" aria-selected="true">{{$language->language_name}}</a>
        </li>
      @endforeach
    </ul>

    <div class="tab-content tab-validate" style="margin-top:20px;">
      @foreach($data['data']->productMultipleDescription as $key=>$language)
      <div class="tab-pane @if($key == 0) active @endif" id="language{{$language->language_id}}">

        <h4 class="ml-3 mb-3 text-info"> Enter data in {{$language->language_name}} </h4>

        <div class="col-md-12 form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-name">{{ __('Product Name') }}*</label>
            <input type="text" name="multilanguage[{{$language->id}}][name]"  class="form-control productName form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $language->name ) }}" autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-md-12 form-group{{ $errors->has('short_description') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-name">{{ __('Product Short Description') }}</label>
            <textarea name="multilanguage[{{$language->id}}][short_description]"  class="form-control" placeholder="{{ __('Product Short Description') }}" value="{{ old('short_description','') }}">{!! old('short_description',$language->short_description) !!}</textarea>
            @if ($errors->has('short_description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('short_description') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-md-12 form-group{{ $errors->has('product_description') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-name">{{ __('Product Description') }}</label>
            <textarea name="multilanguage[{{$language->id}}][description]"  class="ckeditor{{$language->id}} form-control" placeholder="{{ __('Product Description') }}" value="{{ old('description',$language->description ) }}">{!! $language->description  !!}</textarea>
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>



      </div>
      @endforeach
        <div class="col-md-12 form-group{{ $errors->has('main_image') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-maiin">{{ __('Image') }}</label>
            <input type="file" name="main_image" id="input-maiin" class="form-control form-control-alternative{{ $errors->has('main_image') ? ' is-invalid' : '' }}" value="{{ old('main_image', '') }}" >
            <a target="_blank" href="{{ url(config('constant.file_path.product')."/$product->image") }}">View Image</a>

            @if ($errors->has('main_image'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('main_image') }}</strong>
                </span>
            @endif
        </div>

  </div>
</div>
