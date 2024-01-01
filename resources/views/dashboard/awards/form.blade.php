<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __("Title") }}</label>
        <div class="form-floating">
            <input type="text" class="form-control gui-input" id="title_inp" name="title" value="{{old('title', $award->title)}}" autocomplete="off" required/>
            <label for="title_inp">{{ __("Enter the name in arabic") }}</label>
        </div>
        <p class="invalid-feedback" id="title" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">

        <label class="fs-5 fw-bold mb-2 required" for="kt_docs_ckeditor_classic">{{ __("Description") }}</label>
        <div class="form-floating">
            <textarea id="kt_docs_ckeditor_classic" name="description">{{old('description', $award->description)}}</textarea>
        </div>
        <p class="invalid-feedback" id="description" ></p>
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
