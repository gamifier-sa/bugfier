<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Title") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="text" class="form-control gui-input" id="title_inp" name="title" value="{{old('title', $project->title)}}" autocomplete="off" required/>
            <label for="title_inp">{{ __("Enter the name in arabic") }}</label>
        </div>
        <p class="invalid-feedback" id="title" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("Description") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <textarea class="form-control" id="description_inp" name="description" required>{{old('description', $project->description)}}</textarea>
            <label for="description_inp">{{ __("Enter the description") }}</label>
        </div>
        <p class="invalid-feedback" id="description" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

