
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
           
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                    </div>
                    
                 
                    <form  class="user" method="post"  action="<?= base_url('auth/register'); ?>">
                        
                   
                        <div class="form-group">
                              <input type="text" class="form-control form-control-user " name="username" id="username"
                                placeholder="username" value="<?= set_value('username'); ?>">
                               <?= form_error('username','<small class="text-danger pl-3">','</small>' ); ?> 
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user " name="email" id="email"
                                placeholder="email" value="<?= set_value('email'); ?>" >
                                <?= form_error('email','<small class="text-danger pl-3">','</small>' ); ?> 
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user "
                                  id="password1"  name="password1" placeholder="Password" autocomplete="off"> 
                                  <?= form_error('password1','<small class="text-danger pl-3">','</small>' ); ?> 
                            </div>
                            <div class="col-sm-6">
                                <input type="password" id="password2" name="password2"class="form-control form-control-user "
                                     placeholder="Repeat Password" autocomplete="off">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                        Register
                        </button>
                        </form>
                            <hr>
                
                    <div class="text-center">
                        <a class="small" href="<?= base_url('auth'); ?>">sudah punya akun?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
