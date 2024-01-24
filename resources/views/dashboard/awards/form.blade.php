
<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __("Title Arabic") }}</label>
        <div class="form-floating">
            <input type="text" class="form-control gui-input" id="title_ar_inp" name="title_ar" value="{{old('title_ar', $award->title_ar)}}" autocomplete="off" required/>
            <label for="title_ar_inp">{{ __("Enter the title") }}</label>
        </div>
        <p class="invalid-feedback" id="title_ar" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __("Title English") }}</label>
        <div class="form-floating">
            <input type="text" class="form-control gui-input" id="title_en_inp" name="title_en" value="{{old('title_en', $award->title_en)}}" autocomplete="off" required/>
            <label for="title_en_inp">{{ __("Enter the title") }}</label>
        </div>
        <p class="invalid-feedback" id="title_en" ></p>
    </div><!-- end   :: Column -->

</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">

        <label class="fs-5 fw-bold mb-2 required" for="kt_docs_ckeditor_classic">{{ __("Description Arabic") }}</label>
        <div class="py-5" data-bs-theme="light" style="color: #000">
            <textarea id="kt_docs_ckeditor_classic" name="description_ar">{{old('description_ar', $award->description_ar)}}</textarea>
            <p class="invalid-feedback" id="description_ar" ></p>
        </div>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">

        <label class="fs-5 fw-bold mb-2 required" for="kt_docs_ckeditor_classic2">{{ __("Description English") }}</label>
        <div class="py-5" data-bs-theme="light" style="color: #000">
            <textarea id="kt_docs_ckeditor_classic2" name="description_en">{{old('description_en', $award->description_en)}}</textarea>
            <p class="invalid-feedback" id="description_en" ></p>
        </div>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->


<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __("Point") }}</label>
        <div class="form-floating">
            <input type="number" class="form-control" id="point_inp" name="point" value="{{old('point', $award->point)}}" autocomplete="off" required/>
            <label for="point_inp">{{ __("Enter the name in arabic") }}</label>
        </div>
        <p class="invalid-feedback" id="point" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 @if(!request()->segment(4) == 'edit') required @endif">{{ __("Images") }}</label>
        <div class="form-floating">
            <input type="file" class="form-control" multiple id="images_inp" name="images[]" @if(!request()->segment(4) == 'edit') required @endif autocomplete="off"/>
            <label for="images_inp">{{ __("Enter the images") }}</label>
        </div>
        <p class="invalid-feedback" id="images_inp"></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->
