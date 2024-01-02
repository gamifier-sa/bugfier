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

            <label class="fs-5 fw-bold mb-2 required">{{ __("Phone") }}</label>
            <div class="form-floating">
                <input type="tel" class="form-control" id="phone_inp" name="phone" maxlength="11" pattern="[0-9]{11}" value="{{old('phone', $admin->phone)}}" required/>
                <label for="phone_inp">{{ __("Enter the phone") }}</label>
            </div>
            <p class="invalid-feedback" id="phone" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

