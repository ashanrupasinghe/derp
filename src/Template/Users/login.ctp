    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?= $this->Flash->render('auth') ?>
<?php echo $this->Form->create('User'); ?>
	<?= $this->Form->create() ?>
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
                <?php /* ?><?= $this->Form->input('username') ?><?php */?>
        
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
                
                <?php /* ?><?= $this->Form->input('password') ?><?php */?>
              </div>
              <div>
                
                <?= $this->Form->button(__('Log in'),['class'=>'btn btn-default submit']); ?>
                <a class="reset_pass" href="#">Lost your password?</a>
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













