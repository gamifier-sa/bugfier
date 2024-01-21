<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade @if(getLocale() == 'ar') show active @endif" id="arabic" role="tabpanel">
        <!-- begin :: Row -->
        <div class="row mb-8 p-5">
            <!-- begin :: Column -->
            <div class="col-md-12 fv-row">
                <label class="fs-5 fw-bold mb-2 required">{{ __("Title Arabic") }}</label>
                <div class="form-floating">
                    <input type="text" class="form-control gui-input" id="title_ar_inp" name="title_ar" value="{{old('title_ar', $status->title_ar)}}" autocomplete="off" required/>
                    <label for="title_ar_inp">{{ __("Enter the Title") }}</label>
                </div>
                <p class="invalid-feedback" id="title_ar" ></p>
            </div><!-- end   :: Column -->
        </div><!-- end   :: Row -->
    </div>

    <div class="tab-pane fade @if(getLocale() == 'en') show active @endif" id="english" role="tabpanel">
        <!-- begin :: Row -->
        <div class="row mb-8 p-5">
            <!-- begin :: Column -->
            <div class="col-md-12 fv-row">
                <label class="fs-5 fw-bold mb-2 required">{{ __("Title English") }}</label>
                <div class="form-floating">
                    <input type="text" class="form-control gui-input" id="title_en_inp" name="title_en" value="{{old('title_en', $status->title_en)}}" autocomplete="off" required/>
                    <label for="title_en_inp">{{ __("Enter the Title") }}</label>
                </div>
                <p class="invalid-feedback" id="title_en" ></p>
            </div><!-- end   :: Column -->
        </div><!-- end   :: Row -->
    </div>
</div>
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
                @if($status->is_default) disabled @endif
                @checked(old('is_default', $status->is_default))
                id="kt_flexSwitchCustomDefault_1_1"
            />
            <label class="form-check-label" for="kt_flexSwitchCustomDefault_1_1"> {{__('Is Default')}} </label>
            <p class="invalid-feedback" id="is_default"></p>
        </div>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->
