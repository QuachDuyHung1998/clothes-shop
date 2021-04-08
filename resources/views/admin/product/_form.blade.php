<form action="{{ route('admin.product') }}" method="POST">
    @csrf
    <div class="form-group field-name required">
        <label class="control-label" for="name">{{ __('Product name') }} <span class="color-required">(*)</span></label>
        <div class="input-group input-group-merge">
            <div class="input-group-prepend">
                <span class="input-group-text"><i data-feather="home"></i></span>
            </div>
            <input type="text" id="name" class="form-control" name="name" autocomplete="off" placeholder="{{ __('Product name') }}">
        </div>
        <div class="help-block">@error('name') {{ $message }} @enderror</div>
    </div>
    <div class="form-group">
        <label class="control-label">{{ __('Category') }} <span class="color-required">(*)</span></label>
        <select id="category_id" name="category_id" class="form-control select2">
            <option value="">{{ __('Choose category') }}</option>                    
            @foreach ($list_category as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>                    
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <div class="user-image mb-3 text-center">
            <div class="imgPreview"> </div>
        </div>            
        <div class="custom-file">
            <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
            <label class="custom-file-label" for="images">Choose image</label>
        </div>
    </div>

    <div class="form-group field-banner-image">
        <label class="control-label mr-1">Ảnh sản phẩm</label>
        <input type="hidden" name="image[]" type="file" accept="image/*">
        <div class="bg-area border-area imgPreview" style="color: #7367F0;">
            <span>
                <div>Chọn ảnh</div>
                <i data-feather="upload" class="font-lagre-5"></i>
            </span>
        </div>
        <div class="help-block"></div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label" for="name">Giá bán</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i data-feather="dollar-sign"></i></span>
                    </div>
                    <input type="hidden" id="price" name="price" class="form-control input-value-save" value="">
                    <input type="text" class="form-control numeral-formatting numeral-price" placeholder="Giá trị" value="">
                </div>
                <div class="help-block">@error('description') {{ $message }} @enderror</div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label class="control-label" for="name">Giá khuyến mãi</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i data-feather="dollar-sign"></i></span>
                    </div>
                    <input type="hidden" id="price_discount" name="price_discount" class="form-control input-value-save" value="">
                    <input type="text" class="form-control numeral-formatting numeral-price-dicount" placeholder="Giá trị" value="">
                </div>
                <div class="help-block">@error('price_discount') {{ $message }} @enderror</div>
            </div>
        </div>
    </div>    
    <div class="form-group">
        <label class="control-label" for="name">Mô tả</label>
        <div class="input-group input-group-merge">
            <div class="input-group-prepend">
                <span class="input-group-text"><i data-feather="home"></i></span>
            </div>
            <input type="text" id="description" class="form-control" name="description" autocomplete="off" placeholder="Mô tả ngắn cho sản phẩm">
        </div>
        <div class="help-block">@error('description') {{ $message }} @enderror</div>
    </div>

    
    <div class="form-group d-flex">
        <button type="submit" class="btn btn-primary btn-submit-form d-flex align-items-center mr-1">
            <i data-feather="save" class="font-medium-1 mr-50"></i>
            <span>{{ __('Save') }}</span>
        </button>
        <a href="{{ route('admin.product') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
    </div>
</form>
