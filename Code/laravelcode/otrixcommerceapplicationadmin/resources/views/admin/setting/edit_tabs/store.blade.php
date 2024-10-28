<div class="tab-pane active" id="tab-store">
    <div class="pl-lg-4 row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="config_store_name" class="control-label">Store Name</label>
                <input type="text" name="config_store_name" id="config_store_name" value="{{ old('config_store_name', \App\Models\Setting::setInputValue($data,'config_store_name')) }}" class="form-control" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="config_store_owner" class="control-label">Store Owner</label>
                <input type="text" name="config_store_owner" id="config_store_owner" value="{{ old('config_store_owner', \App\Models\Setting::setInputValue($data,'config_store_owner')) }}" class="form-control" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="config_address" class="control-label">Address</label>
                <textarea name="config_address" rows="3"  id="config_address" class="form-control">{{ \App\Models\Setting::setInputValue($data,'config_address') }}</textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="config_geocode" class="control-label">Geocode</label>
                <input type="text" name="config_geocode"  id="config_geocode" value="{{ old('config_geocode', \App\Models\Setting::setInputValue($data,'config_geocode')) }}" class="form-control" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="config_email" class="control-label">Email</label>
                <input type="text" name="config_email"  id="config_email" value="{{ old('config_email', \App\Models\Setting::setInputValue($data,'config_email')) }}" class="form-control" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="config_telephone" class="control-label">Telephone</label>
                <input type="text" name="config_telephone"  id="config_telephone" value="{{ old('config_telephone', \App\Models\Setting::setInputValue($data,'config_telephone')) }}" class="form-control" />
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="config_fax" class="control-label">PostCode</label>
                <input type="text" name="config_fax"  id="config_fax" value="{{ old('config_fax', \App\Models\Setting::setInputValue($data,'config_fax')) }}" class="form-control" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="config_fax" class="control-label">Store Currency Symbol</label>
                <input type="text" name="config_currency"  id="config_currency" value="{{ old('config_currency', \App\Models\Setting::setInputValue($data,'config_currency')) }}" class="form-control" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="config_layout" class="control-label">Website Layout</label>
                <select class="form-control" name="config_layout">
                  <option value="otrixlayout" @if(\App\Models\Setting::setInputValue($data,'config_layout') == 'otrixlayout') selected="true" @endif>Otrix Layout</option>
                </select>
            </div>
        </div>

    </div>
    <div class="pl-lg-4 row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="config_signup_discount_status" class="control-label">Signup Discount Enable/Disable</label>
                <select class="form-control" name="config_signup_discount_status">
                    <option value="1" @if(\App\Models\Setting::setInputValue($data,'config_signup_discount_status') == 1) selected="true" @endif>Enable</option>
                    <option value="0" @if(\App\Models\Setting::setInputValue($data,'config_signup_discount_status') == 0) selected="true" @endif>Disable</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="config_signup_discount" class="control-label">Sign Up Discount</label>
                <input type="text" name="config_signup_discount" id="config_signup_discount" value="{{ old('config_signup_discount', \App\Models\Setting::setInputValue($data,'config_signup_discount')) }}" class="form-control" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="config_signup_discount" class="control-label">Sign Up Discount Text</label>
                <input type="text" name="config_signup_discount_text" id="config_signup_discount_text" value="{{ old('config_signup_discount_text', \App\Models\Setting::setInputValue($data,'config_signup_discount_text')) }}" class="form-control" />
            </div>
        </div>

    </div>
</div>
