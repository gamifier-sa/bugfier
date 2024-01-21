<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade @if(getLocale() == 'ar') show active @endif" id="arabic" role="tabpanel">
        <!-- begin :: Row -->
        <div class="row mb-8 p-5">
            <!-- begin :: Column -->
            <div class="col-md-12 fv-row">
                <label class="fs-5 fw-bold mb-2 required">{{ __("Title Arabic") }}</label>
                <div class="form-floating">
                    <input type="text" class="form-control gui-input" id="title_ar_inp" name="title_ar" value="{{old('title_ar', $project->title_ar)}}" autocomplete="off" required/>
                    <label for="title_ar_inp">{{ __("Enter the title") }}</label>
                </div>
                <p class="invalid-feedback" id="title_ar" ></p>
            </div><!-- end   :: Column -->
        </div><!-- end   :: Row -->

        <!-- begin :: Row -->
        <div class="row mb-8 p-5">
            <!-- begin :: Column -->
            <div class="col-md-12 fv-row">
                <label class="fs-5 fw-bold mb-2 required" for="kt_docs_ckeditor_classic">{{ __("Description Arabic") }}</label>
                <div class="py-5" data-bs-theme="light" style="color: #000">
                    <textarea class="form-control" name="description_ar" id="kt_docs_ckeditor_classic">{{old('description_ar', $project->description_ar)}}</textarea>
                    <p class="invalid-feedback" id="description_ar" ></p>
                </div>
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
                    <input type="text" class="form-control gui-input" id="title_en_inp" name="title_en" value="{{old('title_en', $project->title_en)}}" autocomplete="off" required/>
                    <label for="title_en_inp">{{ __("Enter the title") }}</label>
                </div>
                <p class="invalid-feedback" id="title_ar" ></p>
            </div><!-- end   :: Column -->
        </div><!-- end   :: Row -->

        <!-- begin :: Row -->
        <div class="row mb-8 p-5">
            <!-- begin :: Column -->
            <div class="col-md-12 fv-row">
                <label class="fs-5 fw-bold mb-2 required" for="kt_docs_ckeditor_classic2">{{ __("Description English") }}</label>
                <div class="py-5" data-bs-theme="light" style="color: #000">
                    <textarea class="form-control" name="description_en" id="kt_docs_ckeditor_classic2">{{old('description_en', $project->description_en)}}</textarea>
                    <p class="invalid-feedback" id="description_en" ></p>
                </div>
            </div><!-- end   :: Column -->
        </div><!-- end   :: Row -->
    </div>
</div>
