<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= __('Add Order') ?> <small><?= __('Add Order') ?></small></h2>
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
                    
                    <?= $this->Form->create($order,['id'=>'order']) ?>
                    
                    
                     <div class="form-group">
                          <label for="product-list">Products</label>
                          <?php echo $this->Form->input('Orders.products_id',['label' => false,'class'=>'form-control','empty'=>'select product','options'=>$products,'name'=>'product_name_list[]','required'=>true,'multiple'=>'multiple', 'id'=>'product-list']);?>                          
                     </div>
                     <div class="dynamic-fields-product-list"></div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>
                    </div>    
    					<?= $this->Form->end() ?>
                    
                    
                    
                    
		  

                  </div>
                </div>
</div>

<!-- jQuery -->
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<!-- jQuery Multifield -->

  
<script>
	/*
	$('#example-6').multifield({
		section: '.group',
		btnAdd:'#btnAdd-6',
		btnRemove:'.btnRemove'
	});
	*/
	
	
  /*$('select').select2();*/
  //$('#product-list').on('change', function(e) { alert("huu");});

</script>

<!-- Place this tag right after the last button or just before your close body tag. -->
<script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>
