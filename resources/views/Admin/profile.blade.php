<?php
if (isset($userdata)) {
    //print_r($userdata);die;
    $user = $userdata[0];
    if (isset($user->first_name)) {
        $first_name = $user->first_name;
    }
    if (isset($user->last_name)) {
        $last_name = $user->last_name;
    }
    if (isset($user->gender)) {
        $gender = $user->gender;
    }
    if (isset($user->email)) {
        $email = $user->email;
    }
    if (isset($user->phone)) {
        $phone = $user->phone;
    }
    if (isset($user->dob)) {
        $dob = $user->dob;
    }
    if (isset($user->bio)) {
        $bio = $user->bio;
    }
    if (isset($user->country)) {
        $country = $user->country;
    }
    if (isset($user->state)) {
        $state = $user->state;
    }
    if (isset($user->city)) {
        $city = $user->city;
    }
    if (isset($user->pincode)) {
        $pincode = $user->pincode;
    }
    if (isset($user->address)) {
        $address = $user->address;
    }
    if (isset($user->createOn)) {
        $createOn = $user->createOn;
    }
    if (isset($user->updateOn)) {
        $updateOn = $user->updateOn;
    }
    $fullName = $user->first_name . ' ' . $user->last_name;
}
?>
<main id="main" class="main">
  <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active">Profile</li>
          </ol>
      </nav>
  </div>
    <section class="section profile">
      <form id="save_profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="row card-body profile-card pt-4 align-items-center">
                      <div class="col-md-9 d-md-flex text-md-start text-center">
                        <div class="me-4 position-relative">
                            <form runat="server">
                                <img src="{{ asset('public/assets/img/profile_default_pic.png') }}" id="blah" alt="Profile" class="rounded-circle" style="width: 120px;height: 120px;">
                                <input type="file" id="profilePic" accept="image/*" style="width: 120px;height: 120px;opacity: 0;border-radius: 120px;position: absolute;left: 0;cursor: pointer;">
                            </form>
                        </div>
                        <div class="pt-4 mt-2">
                          <h4 class="my-1 text-capitalize">{{ $fullName }}
                            <i class="bi bi-patch-check-fill text-info small ms-2"></i>
                          </h4>
                          <ul class="list-inline">
                            <li class="list-inline-item text-capitalize"><i class="bi bi-geo-alt me-1"></i>Delhi</li>
                            <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Joined on Mar 22, 2023</li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-md-3 text-md-end text-center">
                        <button type="button" id="saveDetails" class="btn btn-primary fw-bold mx-1 px-4 py-2 rounded-0">
                          <i class="fas fa-info-circle me-2"></i>Save All
                        </button>
                      </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Personal Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="fname" class="col-form-label">First Name</label>
                                <input name="fname" type="text" class="form-control" id="fname"
                                    value="{{ $first_name }}">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="lname" class="col-form-label">Last Name</label>
                                <input name="lname" type="text" class="form-control" id="lname"
                                    value="{{ $last_name }}">
                            </div>
                            <div class="col-md-4 mb-2">
                                <fieldset class="row px-3">
                                    <label class="col-form-label px-0 mb-2">Gender</label>
                                    <div class="form-check col-md-4">
                                        <input class="form-check-input" type="radio" name="gender" id="gender1"
                                            value="male" <?php if ($gender == 'male') {
                                                echo 'checked';
                                            } ?> checked>
                                        <label class="form-check-label" for="gender1">Male</label>
                                    </div>
                                    <div class="form-check col-md-4">
                                        <input class="form-check-input" type="radio" name="gender" id="gender2"
                                            value="female" <?php if ($gender == 'female') {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label" for="gender2">Female</label>
                                    </div>
                                    <div class="form-check col-md-4">
                                        <input class="form-check-input" type="radio" name="gender" id="gender3"
                                            value="others" <?php if ($gender == 'others') {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label" for="gender3">Others</label>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="email" class="col-form-label">Email Address</label>
                                <input name="email" type="text" class="form-control" id="email"
                                    value="{{ $email }}">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="phone" class="col-form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="" id="inputGroupPrepend"
                                        style="padding: 0px;width: 80px;height: 37px;">
                                        <select class="" id="phonecode" name="phonecode"
                                            style="height: 37px;border: 1px solid #ced4da;border-radius: 0.375rem;">
                                            <?php if(isset($countries)){ //print_r($countries);die;
                                        foreach ($countries as $row) { ?>
                                            <option value="{{ $row->phonecode }}">{{ $row->phonecode }}</option>
                                            <?php } } ?>
                                        </select>
                                    </span>
                                    <input type="text" id="phone" class="form-control"
                                        placeholder="85******23" value="{{ $phone }}">
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="dob" class="col-form-label">DOB</label>
                                <input name="dob" type="date" class="form-control" id="dob"
                                    value="">
                            </div>
                            <div class="col-12 mb-2">
                                <label for="bio" class="col-form-label" rows="2">Bio</label>
                                <textarea class="form-control" name="bio" id="bio" placeholder="" value="{{ $bio }}"></textarea>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="country" class="col-form-label">Country</label>
                                <select class="form-select" id="country" name="country">
                                    <option value="">Select your country</option>
                                    <?php if(isset($countries)){
                                    foreach ($countries as $row) { ?>
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="state" class="col-form-label">State</label>
                                <select class="form-select" id="state" name="state">
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="city" class="col-form-label">City</label>
                                <div class="">
                                    <div class="">
                                        <select class="form-select" id="city" name="city">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="pincode" class="col-form-label">Pin Code</label>
                                <input name="pincode" type="text" class="form-control" id="pincode"
                                    value="">
                            </div>
                            <div class="col-md-8 mb-2">
                                <label for="address" class="col-form-label" rows="2">Address</label>
                                <textarea class="form-control" name="address" id="address" placeholder="" value="{{ $address }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Social Media Links</h4>
                    </div>
                    <div class="card-body">
                        <div class="row" id="add_media">
                            <div class="row col-12 m-0 p-0">
                                <div class="col-md-5 col-10 mb-2">
                                    <label for="social_account" class="col-form-label">Select Social Media
                                        Account</label>
                                    <select class="form-select socailMedia" id="social_account"
                                        name="social_account">
                                        <option selected="Facebook">Facebook</option>
                                        <option value="instagram">Instagram</option>
                                        <option value="twitter">Twitter</option>
                                        <option value="linkedin">Linkedin</option>
                                        <option value="youtube">Youtube</option>
                                    </select>
                                </div>
                                <div class="col-md-5 col-10 mb-3">
                                    <label for="social_account_url" class="col-form-label">Add Social Media
                                        Link</label>
                                    <input name="social_account_url" type="text" class="form-control"
                                        id="social_account_url">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <button type="button" id="add_link" class="btn bg-primary text-white"><i
                                    class="bi bi-plus-lg"></i> Add More Social Media</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Change Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-4 col-12 mb-3">
                                <label for="currentpass" class="col-form-label">Current Password</label>
                                <div class="input-group has-validation">
                                    <input name="currentpass" type="password" class="form-control"
                                        id="currentpass" value="">
                                    <span class="input-group-text" id="inputGroupPrepend">
                                        <a href="JavaScript:void(0)" class="tooglePass"><i
                                                class="bi bi-eye-slash"></i></a>
                                    </span>
                                    <div class="invalid-feedback" id="currentpass_err"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-4 col-12 new_pass_tab d-none mb-3">
                                <label for="lname" class="col-form-label">New Password</label>
                                <div class="input-group has-validation">
                                    <input name="new_pass" type="password" class="form-control" id="new_pass"
                                        value="">
                                    <span class="input-group-text" id="inputGroupPrepend">
                                        <a href="JavaScript:void(0)" class="tooglePass"><i
                                                class="bi bi-eye-slash"></i></a>
                                    </span>
                                    <div class="invalid-feedback" id="new_pass_err"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-4 col-12 new_pass_tab d-none mb-3">
                                <label for="email" class="col-form-label">Confirm Password</label>
                                <div class="input-group has-validation">
                                    <input name="conf_pass" type="password" class="form-control" id="conf_pass"
                                        value="">
                                    <span class="input-group-text" id="inputGroupPrepend">
                                        <a href="JavaScript:void(0)" class="tooglePass"><i
                                                class="bi bi-eye-slash"></i></a>
                                    </span>
                                    <div class="invalid-feedback" id="conf_pass_err"></div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-success" id="changePass"><i
                                        class="bi bi-pencil-square"></i> Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
  </section>

</main>
