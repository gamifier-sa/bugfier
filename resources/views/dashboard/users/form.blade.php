    <!-- begin :: Row -->
    <div class="row mb-8 p-5">

        <!-- begin :: Column -->
        <div class="col-md-12 fv-row">

            <label class="fs-5 fw-bold mb-2">{{ __("Name") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control gui-input" id="name_inp" name="name" value="{{old('name', $user->name)}}" autocomplete="off" required/>
                <label for="name_inp">{{ __("Enter the name") }}</label>
            </div>
            <p class="invalid-feedback" id="name" ></p>
        </div><!-- end   :: Column -->

    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8 p-5">

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">

            <label class="fs-5 fw-bold mb-2">{{ __("Email") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="email" class="form-control" id="email_inp" name="email" value="{{old('email', $user->email)}}"  autocomplete="off" required/>
                <label for="email_inp">{{ __("Enter the email") }}</label>
            </div>
            <p class="invalid-feedback" id="email" ></p>
        </div><!-- end   :: Column -->


        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">

            <label class="fs-5 fw-bold mb-2">{{ __("Phone") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="tel" class="form-control" id="phone_inp" pattern="^(00201|\+201|01)[0-2,5]{1}[0-9]{8}$" name="phone" value="{{old('phone', $user->phone)}}" required/>
                <label for="phone_inp">{{ __("Enter the phone") }}</label>
            </div>
            <p class="invalid-feedback" id="phone" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

