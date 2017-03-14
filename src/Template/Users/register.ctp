    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?= $this->Flash->render('auth') ?>
<?php echo $this->Form->create('User'); ?>
	<?= $this->Form->create() ?>
              <h1>Login Form</h1>
			  <div>
                <input type="text" class="form-control" placeholder="First Name" required="" name="firstName" />
              </div>
			  <div>
                <input type="text" class="form-control" placeholder="Last Name" required="" name="lastName" />
              </div>
<!--		  
			  <div>
                <input type="text" class="form-control" placeholder="address" required="" name="address" />
              </div>
-->              
<!--		  
			  <div>                
                <?php echo $this->Form->input('city',['label' => false,'options'=>$cities,'empty'=>'select city','class'=>'form-control']);?>                
              </div>
-->
              <div>
                <input type="email" class="form-control" placeholder="email" required="" name="email" />
              </div>
<!--		                
              <div>
                <input type="text" class="form-control" placeholder="mobile No" required="" name="mobileNo" />
              </div>
-->              			  
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>			  
			  <div>
                <input type="password" class="form-control" placeholder="Confirm Password" required="" name="confirm_password" />
              </div>
              <div>
              <input type="hidden" name="newsLetter" value="0" />
			  <input type="checkbox" name="newsLetter" value="1" /> signup for newsletter
              <div>
              <input type="hidden" class="form-control" placeholder="form type" value="login-customer" name="formType" />
              <div> 
              <br>               
                <?= $this->Form->button(__('Signup'),['class'=>'btn btn-default submit']); ?>
                <a class="reset_pass" href="#">Lost your password?</a>
                <a class="reset_pass" href="/users/login">Already have account?</a>
              </div>

              <div class="clearfix"></div>	
              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Direct2Door.ERP</h1>
                  <p>©2016 All Rights Reserved. Direct2Door.ERP!</p>
                </div>
              </div>
           <?= $this->Form->end() ?>
          </section>
        </div>

      </div>
    </div>
