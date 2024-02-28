    <!-- begin :: Row -->
    <div class="row mb-8 p-5">

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">

            <label class="fs-5 fw-bold mb-2 required">{{ __("Name Arabic") }}</label>
            <div class="form-floating">
                <input type="text" class="form-control gui-input" id="name_ar_inp" name="name_ar" value="{{old('name_ar', $admin->name_ar)}}" autocomplete="off" required/>
                <label for="name_ar_inp">{{ __("Enter the name in arabic") }}</label>
            </div>
            <p class="invalid-feedback" id="name_ar" ></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">

            <label class="fs-5 fw-bold mb-2 required">{{ __("Name English") }}</label>
            <div class="form-floating">
                <input type="text" class="form-control en-input" id="name_en_inp" name="name_en" value="{{old('name_en', $admin->name_en)}}" autocomplete="off"/>
                <label for="name_en_inp">{{ __("Enter the name in english") }}</label>
            </div>
            <p class="invalid-feedback" id="name_en" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8 p-5">

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2 required">{{ __("Email") }}</label>
            <div class="form-floating">
                <input type="email" class="form-control" id="email_inp" name="email" value="{{old('email', $admin->email)}}"  autocomplete="off" required/>
                <label for="email_inp">{{ __("Enter the email") }}</label>
            </div>
            <p class="invalid-feedback" id="email" ></p>
        </div><!-- end   :: Column -->


        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2  @if(!request()->segment(4) == 'edit') required @endif">{{ __("Phone") }}</label>
            <div class="form-floating">
                <input type="tel" class="form-control" id="phone_inp" name="phone" maxlength="11" pattern="[0-9]{10}" value="{{old('phone', $admin->phone)}}"  @if(!request()->segment(4) == 'edit') required @endif/>
                <label for="phone_inp">{{ __("Enter the phone") }}</label>
            </div>
            <p class="invalid-feedback" id="phone" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->


    <!-- begin :: Row -->
    <div class="row mb-8 p-5">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2 @if(!request()->segment(4) == 'edit') required @endif">{{ __("Password") }}</label>
                <div class="form-floating position-relative">
                    <input type="password" class="form-control" id="password_inp" name="password" @if(!request()->segment(4) == 'edit') required @endif autocomplete="off" />
                    <label for="password_inp">{{ __("Enter the password") }}</label>
                    <a id="togglePasswordVisibility" class="position-absolute top-50 translate-middle-y end-0 "
                       style="margin-right: 10px">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            <p class="invalid-feedback" id="password" ></p>
        </div><!-- end   :: Column -->
        <!-- begin :: Column -->

        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2 @if(!request()->segment(4) == 'edit') required @endif">{{ __("Password confirmation") }}</label>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password_confirmation_inp" name="password_confirmation" @if(!request()->segment(4) == 'edit') required @endif autocomplete="off" />
                    <label for="password_confirmation_inp">{{ __("Enter the password confirmation") }}</label>
                </div>
            <p class="invalid-feedback" id="password_confirmation" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8 p-5">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2" for="levels-sp">{{ __("Levels") }}</label>
            <select class="form-select" data-control="select2" name="level_id" id="levels-sp" data-placeholder="{{ __("Choose the levels") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                <option></option>
                @foreach($levels as $level)
                    <option @selected(old('level_id', $admin->level_id) == $level->id) value="{{ $level->id}}">{{ __($level->name) }}</option>
                @endforeach
            </select>
            <p class="invalid-feedback" id="level_id" ></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2" for="status-sp">{{ __("Status") }}</label>
            <select class="form-select" data-control="select2" name="status" id="status-sp" data-placeholder="{{ __("Choose the status") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                <option></option>
                @foreach($statuses as $status)
                    <option @selected(old('status', $admin->status) == $status->value) value="{{ $status->value}}">{{ __($status->name) }}</option>
                @endforeach
            </select>
            <p class="invalid-feedback" id="status" ></p>
        </div><!-- end   :: Column -->

    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8 p-5">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2 @if(!request()->segment(4) == 'edit') required @endif" for="roles-sp">{{ __("Roles") }}</label>
            <select class="form-select" data-control="select2" name="roles[]" @if(!request()->segment(4) == 'edit') required @endif multiple id="roles-sp" data-placeholder="{{ __("Choose the role") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                @foreach( $roles as $role)
                    <option {{ old('roles') && in_array($role->id, old('roles')) ? 'selected' : (in_array($role->id, $admin->roles->pluck('id')->toArray()) ? 'selected' : '') }} value="{{ $role->id }}"> {{ $role->name }} </option>
                @endforeach
            </select>
            <p class="invalid-feedback" id="roles" ></p>
        </div><!-- end   :: Column -->


        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2" for="daily_attendance-sp">{{ __("Does he have daily attendance?") }}</label>
            <select class="form-select" data-control="select2" name="daily_attendance" id="daily_attendance-sp" data-placeholder="{{ __("Please Choose") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                <option></option>
                <option @selected(old('daily_attendance', $admin->daily_attendance) == 0) value="0">{{ __('Does not have attendance') }}</option>
                <option @selected(old('daily_attendance', $admin->daily_attendance) == 1) value="1">{{ __('He has attendance') }}</option>
            </select>
            <p class="invalid-feedback" id="daily_attendance" ></p>
        </div><!-- end   :: Column -->
    </div>
