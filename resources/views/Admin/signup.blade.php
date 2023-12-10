<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">Welcome to Admin</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>

                                <div class="row g-3 " >
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Your Name</label>
                                        <input type="text" name="name" class="form-control" id="userName">
                                        <div class="invalid-feedback">Please, enter your name!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Your Email</label>
                                        <input type="email" name="email" class="form-control" id="userEmail">
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Phone</label>
                                        <div class="input-group has-validation">
                                            {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                            <input type="number" name="username" class="form-control" id="userPhone">
                                            <div class="invalid-feedback">Please choose a Phone no.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="userPass">
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox"
                                                value="" id="acceptTerms">
                                            <label class="form-check-label" for="acceptTerms">I agree and accept the <a
                                                    href="#">terms and conditions</a></label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="button" id="signup_user">Create
                                            Account</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a
                                                href="{{ route('/login') }}">Log in</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="credits">
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main>


<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
style="
    position: absolute;
    right: -53px;
    top: 60%;
    rotate: -90deg;
    border-radius: 0;
">Trending Offers</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h3 id="offcanvasRightLabel"><i class="bi bi-megaphone"></i> Trending Offers</h3>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="row">
      <div class="col-12 mb-2">
        <a href="">
          <img src="https://picsum.photos/seed/picsum/270/142" alt="" style="border-radius: 15px;">
        </a>
      </div>
      <div class="col-12 mb-2">
        <a href="">
          <img src="https://picsum.photos/seed/picsum/270/142" alt="" style="border-radius: 15px;">
        </a>
      </div>
      <div class="col-12 mb-2">
        <a href="">
          <img src="https://picsum.photos/seed/picsum/270/142" alt="" style="border-radius: 15px;">
        </a>
      </div>
    </div>
  </div>
</div>
