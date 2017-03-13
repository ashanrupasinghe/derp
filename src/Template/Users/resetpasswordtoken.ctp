  
  
  <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?= $this->Flash->render('auth') ?>
		
	<?= $this->Form->create('',['url' => '/users/resetpasswordtoken','id' => 'web-form']) ?>
              <h1>Change Your Password</h1>               
              <input type="hidden" value="<?php echo $reset_password_token;?>" class="form-control"  name="reset_password_token" />
              <input type="hidden" class="form-control" placeholder="form type" value="login-customer" name="formType" />
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />                
              <div>
              <div>
                <input type="password" class="form-control" placeholder="Confirm Passwd" required="" name="confirm_password" />                
              <div>
                
                <?= $this->Form->button(__('Change Password'),['class'=>'btn btn-default submit']); ?>
               
                
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
