<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'Direct2Door.lk';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>


<!-- Bootstrap -->
    
    <?= $this->Html->css('/icing/vendors/bootstrap/dist/css/bootstrap.min',['fullBase' => true]) ?>
    <!-- Font Awesome -->
    
    <?= $this->Html->css('/icing/vendors/font-awesome/css/font-awesome.min',['fullBase' => true]) ?>
    <!-- NProgress -->
    
    <?= $this->Html->css('/icing/vendors/nprogress/nprogress',['fullBase' => true]) ?>
    <!-- iCheck -->
    
    <?= $this->Html->css('/icing/vendors/iCheck/skins/flat/green',['fullBase' => true]) ?>
    
  

    
        <script type="text/javascript">var myBaseUrl = '<?php echo $this->Url->build('/'); ?>';</script>
        
        <?= $this->Html->script('https://use.fontawesome.com/aeb0ff1754.js',['fullBase' => true]);?>

  <?php /*?>      
        <?= $this->Html->script('select2.min',['fullBase' => true]) ?><?php */?>
          
        
        

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       
        
        <!-- /top navigation -->
		<!-- /top navigation -->
		
        <!-- page content -->
        <div class="" role="main">
 
    <!--<div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Plain Page <small>Page subtile </small>
                </h3>
            </div>
 
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input class="form-control" placeholder="Search for..." type="text">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
 -->
        <div class="row">
            <div class="col-md-12">
                <div class="x_content">
                        <!-- content starts here -->
        <?php if($authUser){?>
         <?= $this->Flash->render() ?>
        <?php }?>                         
 <?= $this->fetch('content') ?>
                        <!-- content ends here -->
                    </div>
            </div>
        </div>
    </div>
</div>
        
        
        

<!-- footer content -->
      
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <!--<script src="/direct2door.erp/icing/vendors/jquery/dist/jquery.min.js"></script>-->
    <?= $this->Html->script('/icing/vendors/jquery/dist/jquery.min',['fullBase' => true]); ?>
    <!-- Bootstrap -->
    <!--<script src="/direct2door.erp/icing/vendors/bootstrap/dist/js/bootstrap.min.js"></script>-->
    <?= $this->Html->script('/icing/vendors/bootstrap/dist/js/bootstrap.min',['fullBase' => true]); ?>
    <!-- FastClick -->
    <!--<script src="/direct2door.erp/icing/vendors/fastclick/lib/fastclick.js"></script>-->
    <?= $this->Html->script('/icing/vendors/fastclick/lib/fastclick',['fullBase' => true]); ?>
    <!-- NProgress -->
    <!--<script src="/direct2door.erp/icing/vendors/nprogress/nprogress.js"></script>-->
    <?= $this->Html->script('/icing/vendors/nprogress/nprogress',['fullBase' => true]); ?>
    <!-- iCheck -->
    <!--<script src="/direct2door.erp/icing/vendors/iCheck/icheck.min.js"></script>-->
    <?= $this->Html->script('/icing/vendors/iCheck/icheck.min',['fullBase' => true]); ?>

  <!-- Select2 -->
    <!--<script src="/direct2door.erp/icing/vendors/select2/dist/js/select2.full.min.js"></script>-->
    <?= $this->Html->script('/icing/vendors/select2/dist/js/select2.full.min',['fullBase' => true]); ?>
   
   <!--date picker js-->
   <!--<script src="/direct2door.erp/js/bootstrap-datetimepicker.js"></script>-->
   		<?= $this->Html->script('bootstrap-datetimepicker',['fullBase' => true]); ?>
   
        <?= $this->Html->script('customjs',['fullBase' => true]) ?>
        
        
    <!-- Custom Theme Scripts -->
    <!--<script src="/direct2door.erp/icing/build/js/custom.min.js"></script>-->
    		<?= $this->Html->script('/icing/build/js/custom.min',['fullBase' => true]); ?>
    
    

  </body>
</html>
