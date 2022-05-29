<div class="container">

<div class="container-sm">

      <!-- Outer Row -->
      <div class="row  align-middle">
        <!-- <div class="col-sm"> -->
          <div class="card align-middle  shadow-lg my-5 ">
            <div class="card-body align-middle">
              <!-- Nested Row within Card Body -->
              <!-- <div class="row  align-items-center"> -->
                <div class="col-lg align-middle">
                  <div class="p-5 align-middle">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Login</h1>
                    </div>
                    <?php  $this->session->set_flashdata('message'); ?>
                    <form  method="post" class="user" action="<?= base_url('auth'); ?>">
                   
						<div class="form-group">
							<input type="text" class="form-control form-control-user "
							id="username"	   name="username" placeholder="Enter email address">
                            <?= form_error('username','<small class="text-danger pl-3">','</small>' ); ?>							
						</div>
            
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user " id="password1" name="password1"   placeholder="password">
                           <?= form_error('password1','<small class="text-danger pl-3">','</small>' ); ?>
                      </div>
     
                      <button type="submit" class="btn btn-primary btn-user btn-block"> Login</button>
                      </form>              
                      <hr>

                   
                      <div class="text-center">
                      <a class="small" href="<?= base_url('auth/register'); ?>">belum memiliki akun?</a>
                    </div>
                    

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>



    