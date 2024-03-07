@foreach($admins as $admin)
<!-- begin :: Row -->
<div class="row form-group mb-8 p-5">
    <!-- begin :: Column -->
    <div class="col-md-3">
        <h1 class="pt-3">
            <!--begin::Label-->
            <label class="col-form-label text-lg-start">{{$admin->full_name}}:</label><!--end::Label-->
        </h1>
        <input type="hidden" name="admins[{{ $admin->id }}][user_id]" value="{{$admin->id}}">
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-4 fv-row">
        <label class="fs-5 fw-bold mb-2" for="admins[{{$admin->id}}]date_inp">{{ __("Attendance date") }}: </label>
        <input type="datetime-local" class="form-control gui-input" id="admins[{{$admin->id}}]date_inp" name="admins[{{ $admin->id }}][date]" value="{{now()}}" autocomplete="off"/>
        <p class="invalid-feedback" id="admins[{{$admin->id}}]date"></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-4 fv-row">
        <label class="fs-5 fw-bold mb-2" for="admins[{{$admin->id}}]attendance_inp">{{__('Did you come today?')}}</label>
        <select id="admins[{{$admin->id}}]attendance_inp" class="form-control" name="admins[{{ $admin->id }}][attendance]" data-control="select2" data-hide-search="false" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
            <option selected disabled>{{__('Please Choose')}}</option>
            <option @selected(old('attendance', $admin->attendance) == 'attend') value="attend">{{__('Attend')}}</option>
            <option @selected(old('attendance', $admin->attendance) == 'not_attend') value="not_attend">{{__('Not Attend')}}</option>
            <option @selected(old('attendance', $admin->attendance) == 'vacation') value="vacation">{{__('Vacation')}}</option>
        </select>
        <p class="invalid-feedback" id="admins[{{$admin->id}}]attendance"></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->
@endforeach
