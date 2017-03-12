    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?= $this->Flash->render('auth') ?>
		
	<?= $this->Form->create('',['url' => '/users/forgotpassword','id' => 'web-form']) ?>
              <h1>Forget Password</h1>
              <div>
                              
                <input type="text" class="form-control" placeholder="Email Address" required="" name="username" />                
                

        
              </div>
              
              <div>
                
                <?= $this->Form->button(__('Send'),['class'=>'btn btn-default submit']); ?>
               
                
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













