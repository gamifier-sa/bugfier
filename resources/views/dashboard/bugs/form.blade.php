<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2 required" for="project_id">{{ __("Projects") }}</label>
        <select class="form-control select-2-with-image" data-control="select2" name="project_id" id="project_id_inp" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
            <option selected disabled >{{__('Please Choose')}}</option>
            @foreach($projects as $project)
                <option @selected(old('project_id', $bug->project_id) == $project->id) value="{{$project->id}}">{{$project->title}}</option>
            @endforeach
        </select>
        <p class="invalid-feedback" id="project_id" ></p>
    </div><!-- begin :: Column -->
</div><!-- end   :: Column -->

<!-- begin :: Row -->
<div class="row mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __("Title") }}</label>
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
            <label class="fs-5 fw-bold mb-2 required" for="kt_docs_ckeditor_classic">{{ __("Description") }}</label>
            <textarea name="description" id="kt_docs_ckeditor_classic">{{old('description', $bug->description)}}</textarea>
            <p class="invalid-feedback" id="description"></p>
        </div><!-- end   :: Column -->
    </div>
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8 p-5">
    @can('update_point_bugs')
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Point") }}</label>
        <div class="form-floating">
            <input type="number" class="form-control" id="point_inp" name="point" value="{{old('point', $bug->point)}}" autocomplete="off"/>
            <label for="point_inp">{{ __("Enter the point") }}</label>
        </div>
        <p class="invalid-feedback" id="point"></p>
    </div><!-- end   :: Column -->
    @endcan
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 @if(!request()->segment(4) == 'edit') required @endif">{{ __("Images") }}</label>
        <div class="form-floating">
            <input type="file" class="form-control" multiple id="images_inp" @if(!request()->segment(4) == 'edit') required @endif name="images[]" autocomplete="off"/>
            <label for="images_inp">{{ __("Enter the images") }}</label>
        </div>
        <p class="invalid-feedback" id="images"></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<div class="row mb-8 p-5">
    @can('responsible_admin_bugs')
        @if(request()->segment(4) == 'edit')
            <!-- begin :: Column -->
            <div class="col-md-6 fv-row">
                <label class="fs-5 fw-bold mb-2" for="responsible_admin">{{ __("Responsible") }}</label>
                <select class="form-control select-2-with-image" data-control="select2" name="responsible_admin" id="responsible_admin_inp" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                    <option selected disabled >{{__('Choose')}}</option>
                    @foreach($admins as $row)
                        <option @selected(old('responsible_admin', $bug->responsible_admin) == $row->id) value="{{$row->id}}">{{$row->name_en}}</option>
                    @endforeach
                </select>
                <p class="invalid-feedback" id="responsible_admin"></p>
            </div><!-- begin :: Column -->
        @endif
    @endcan


    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2" for="status_id">{{ __("Status") }}</label>
        <select class="form-control select-2-with-image" data-control="select2" name="status_id_inp" id="status_id" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
            <option selected disabled >{{__('Please Choose')}}</option>
            @foreach($statuses as $status)
                <option @selected(old('status_id', $bug->status_id) == $status->id) value="{{$status->id}}">{{__($status->title)}}</option>
            @endforeach
        </select>
        <p class="invalid-feedback" id="status_id" ></p>
    </div><!-- begin :: Column -->
</div><!-- end   :: Column -->
