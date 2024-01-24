
<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __("Name Arabic") }}</label>
        <div class="form-floating">
            <input type="text" class="form-control gui-input" id="name_ar_inp" name="name_ar" value="{{old('name_ar', $level->name_ar)}}" autocomplete="off" required/>
            <label for="name_ar_inp">{{ __("Enter the Name") }}</label>
        </div>
        <p class="invalid-feedback" id="name_ar" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __("Name English") }}</label>
        <div class="form-floating">
            <input type="text" class="form-control gui-input" id="name_en_inp" name="name_en" value="{{old('name_en', $level->name_en)}}" autocomplete="off" required/>
            <label for="name_en_inp">{{ __("Enter the Name") }}</label>
        </div>
        <p class="invalid-feedback" id="name_en" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->



<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __("Experience") }}</label>
        <div class="form-floating">
            <input type="number" class="form-control gui-input" id="exp_inp" name="exp" value="{{old('exp', $level->exp)}}" autocomplete="off" required/>
            <label for="exp_inp">{{ __("Enter the Experience") }}</label>
        </div>
        <p class="invalid-feedback" id="exp" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->
