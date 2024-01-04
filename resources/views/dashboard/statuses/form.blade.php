<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __("Title") }}</label>
        <div class="form-floating">
            <input type="text" class="form-control gui-input" id="title_inp" name="title" value="{{old('title', $status->title)}}" autocomplete="off" required/>
            <label for="title_inp">{{ __("Enter the Title") }}</label>
        </div>
        <p class="invalid-feedback" id="title" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->


<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
            <input
                class="form-check-input"
                name="is_default"
                type="checkbox"
                value="1"
                @checked(old('is_default', $status->is_default))
                id="kt_flexSwitchCustomDefault_1_1"
            />
            <label class="form-check-label" for="kt_flexSwitchCustomDefault_1_1"> {{__('Is Default')}} </label>
            <p class="invalid-feedback" id="is_default"></p>
        </div>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->
