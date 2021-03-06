<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Add Package Type') ?> <small><?= __('add new package type') ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?= $this->Form->create($packageType,['class'=>'form-horizontal form-label-left']) ?>
                  <div class="row">
  			  		<div class="col-md-6 col-sm-6 col-xs-12">  			  		
  			  		<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Type<span class="required">*</span></label>                        
						<div class="col-md-6 col-sm-6 col-xs-12">                          
                          <?php echo $this->Form->input('type',['label' => false,'class'=>'form-control col-md-7 col-xs-12']);?>                          
                        </div>
                      </div>                       
  			  		
  			  		</div>
  			  	  </div>
    <div class="ln_solid"></div>
    				  <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                          
                             <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>
                        </div>
                      </div>
    <?= $this->Form->end() ?>
  			  		
  			  		
                  </div>
                </div>
</div>





