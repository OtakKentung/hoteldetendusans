<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 col-lg-5">
            <div class="wrap">
              <div class="img PICLogin"></div>
              <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                  <div class="w-100">
                    <h3 class="mb-4">Sign In</h3>
                  </div>
                  <div class="w-100">
                    <p class="social-media d-flex justify-content-end">
                      <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                      <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                    </p>
                  </div>
                </div>
                <form method = "post" action = "<?php echo site_url('log_in')?>" id = "formLogIn" class="signin-form">
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="email" id="email" required="" />
                    <label class="form-control-placeholder" for="email">Email</label>
                  </div>
                  <div class="form-group">
                    <input id="password-field" type="password" class="form-control" name="password" required="" />
                    <label class="form-control-placeholder" for="password">Password</label>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                  </div>
                  <div style="color: red;margin-bottom: 15px;">
                    <?php
                        if($this->session->flashdata('message')){
                            echo $this->session->flashdata('message'); 
                        }
                    ?>
                </div>
                </form>
                <p class="text-center">Not a member? <a data-toggle="tab" href="<?php echo site_url('registerTemplate') ?>">Sign Up</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
