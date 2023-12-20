<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2" for="projectId">{{ __("Projects") }} <span class="text-danger">*</span></label>
        <select class="form-control select-2-with-image" data-control="select2" name="project_id" id="projectId" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
            <option selected disabled >{{__('Choose')}}</option>
            @foreach($projects as $project)
                <option @selected(old('project_id', $bug->project_id) == $project->id) value="{{$project->id}}">{{$project->title}}</option>
            @endforeach
        </select>
        <p class="invalid-feedback" id="projectId" ></p>
    </div><!-- begin :: Column -->
</div><!-- end   :: Column -->

<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Title") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="text" class="form-control gui-input" id="title_inp" name="title" value="{{old('title', $bug->title)}}" autocomplete="off" required/>
            <label for="title_inp">{{ __("Enter the title") }}</label>
        </div>
        <p class="invalid-feedback" id="title" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <div class="py-5" data-bs-theme="light">
            <label class="fs-5 fw-bold mb-2" for="kt_docs_ckeditor_classic">{{ __("Description") }} <span class="text-danger">*</span></label>
            <textarea name="description" id="kt_docs_ckeditor_classic">{{old('description', $bug->description)}}</textarea>
            <p class="invalid-feedback" id="description" ></p>
        </div><!-- end   :: Column -->
    </div>
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Point") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="number" class="form-control" id="point_inp" name="point" value="{{old('point', $bug->point)}}" autocomplete="off" required/>
            <label for="point_inp">{{ __("Enter the point") }}</label>
        </div>
        <p class="invalid-feedback" id="point" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Images") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="file" class="form-control" multiple id="images_inp" name="images[]" autocomplete="off"/>
            <label for="images_inp">{{ __("Enter the images") }}</label>
        </div>
        <p class="invalid-feedback" id="point" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->


<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2" for="projectId">{{ __("Status") }} <span class="text-danger">*</span></label>
        <select class="form-control select-2-with-image" data-control="select2" name="status" id="status" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
            <option selected disabled >{{__('Choose')}}</option>
            @foreach($status as $row)
                <option @selected(old('status', $bug->status) == $row->value) value="{{$row->value}}">{{__($row->value)}}</option>
            @endforeach
        </select>
        <p class="invalid-feedback" id="status" ></p>
    </div><!-- begin :: Column -->
</div><!-- end   :: Column -->
