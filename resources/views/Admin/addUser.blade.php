<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="card-title m-0">Add & Edit User</h3>
                    </div>
                    <div class="col-md-6 text-end my-auto">
                        <button class="btn btn-success px-4 py-2 add_user">Save</button>
                        <a href="{{ route('/user') }}" class="btn btn-danger px-4 py-2">Close</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Datatables</h5>
                <form class="row g-3" id="user_form_data">
                    <div class="col-md-2">
                        <label for="user_type" class="form-label">Type Of User</label>
                        <select id="user_type" class="form-select">
                            <option value="">Choose an option</option>
                            <option value="2">Super Admin</option>
                            <option value="1">Sub Admin</option>
                        </select>
                        <div class="invalid-feedback" id="user_type_err"></div>
                    </div>
                    <div class="col-md-4">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="rohan" id="fname">
                        <div class="invalid-feedback" id="fname_err"></div>
                    </div>
                    <div class="col-md-4">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="mishra" id="lname">
                        <div class="invalid-feedback" id="lname_err"></div>
                    </div>
                    <div class="col-md-5">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" placeholder="example@gmail.com" id="email">
                        <div class="invalid-feedback" id="email_err"></div>
                    </div>
                    <div class="col-md-5">
                        <label for="phone" class="form-label">Phone No.</label>
                        <input type="number" class="form-control" placeholder="91******23" id="phone">
                        <div class="invalid-feedback" id="phone_err"></div>
                    </div>
                    <div class="col-md-5">
                        <label for="pass" class="form-label">Password</label>
                        <div class="input-group has-validation">
                            <input type="password" class="form-control valid_pass" placeholder="********" id="pass">
                            <span class="input-group-text" id="inputGroupPrepend">
                            <a href="JavaScript:void(0)" class="tooglePass"><i class="bi bi-eye-slash"></i></a>
                            </span>
                            <div class="invalid-feedback" id="pass_err"></div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="cnf_pass" class="form-label">Confirm Password</label>
                        <div class="input-group has-validation">
                            <input type="password" class="form-control" placeholder="********" id="cnf_pass">
                            <span class="input-group-text" id="inputGroupPrepend">
                            <a href="JavaScript:void(0)" class="tooglePass"><i class="bi bi-eye-slash"></i></a>
                            </span>
                            <div class="invalid-feedback" id="cnf_pass_err"></div>
                        </div>

                    </div>
                    <div class="col-10 mt-4 mb-3 text-center">
                      <button type="button" class="btn btn-primary mx-1 px-4 py-2 fw-bold add_user">Save</button>
                      <button type="reset" class="btn btn-secondary mx-1 px-4 py-2 fw-bold">Reset</button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
