<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Title") }} <span class="text-danger">*</span></label>
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

        <label class="fs-5 fw-bold mb-2" for="kt_docs_ckeditor_classic">{{ __("Description") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <textarea id="kt_docs_ckeditor_classic" name="description">{{old('description', $award->description)}}</textarea>
        </div>
        <p class="invalid-feedback" id="description" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Point") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="number" class="form-control" id="point_inp" name="point" value="{{old('point', $award->point)}}" autocomplete="off" required/>
            <label for="point_inp">{{ __("Enter the name in arabic") }}</label>
        </div>
        <p class="invalid-feedback" id="point" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->
