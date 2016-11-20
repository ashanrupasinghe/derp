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

        <?= $this->Html->css('base') ?>
        <?= $this->Html->css('cake') ?>
        <?= $this->Html->css('select2.min') ?>
        <?= $this->Html->css('custom')?>
        <script type="text/javascript">var myBaseUrl = '<?php echo $this->Url->build('/'); ?>';</script>
        <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js');?>
        <?= $this->Html->script('select2.min') ?>
        <?= $this->Html->script('customjs') ?>
        
        

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <nav class="top-bar expanded" data-topbar role="navigation">
            <ul class="title-area large-2 medium-2 columns">
                <li class="name">
                    <h1><a href="<?php echo $this->Url->build('/customers/search'); ?>">Direct2Door.lk ERP</a></h1>
                </li>
            </ul>
            
            <?php if ($authUser): ?>
            <div class="top-bar-section">
                <ul class="right">
                    <li><?= $this->Html->link(__('Logout'), ['controller'=>'Users', 'action' => 'logout']) ?></li>
                </ul>
            </div>
           <?php endif; ?>
        </nav>
        <?= $this->Flash->render() ?>
        <div class="container clearfix">
            <?php if ($authUser): ?>            
            
            <nav class="large-2 medium-2 columns" id="actions-sidebar">
                <ul class="side-nav">	
                    <li>
                    <?php if($userLevel==1 || $userLevel==2):
                    echo $this->Html->link(__('Dashboard'), ['controller'=>'customers', 'action' => 'search']);
                     else:                    
                    echo $this->Html->link(__('Dashboard'), ['action' => 'index']);
                    endif;
                    ?>
                    </li>
                    <li><?= $this->Html->link(__('Products'), ['controller'=>'Products','action' => 'index']) ?>
                    </li>
                    <li><?= $this->Html->link(__('Orders'), ['controller'=>'Orders','action' => 'index']) ?>
                    </li>
                    <?php if($userLevel==1):?>
                    <li><?= $this->Html->link(__('Call Centre Staff'), ['controller'=>'Callcenter','action' => 'index']) ?>
                    </li>
                    <li><?= $this->Html->link(__('Suppliers'), ['controller'=>'Suppliers','action' => 'index']) ?>
                    </li>
                    <li><?= $this->Html->link(__('Delivery Staff'), ['controller'=>'Delivery','action' => 'index']) ?>
                    <?php endif; ?>
                    </li>
                    <li><?= $this->Html->link(__('Customers'), ['controller'=>'Customers','action' => 'index']) ?>
                    </li>
                    <?php if($userLevel==1):?>
                    <li><?= $this->Html->link(__('Users'), ['controller'=>'Users','action' => 'index']) ?>
                    </li>
                    <li><?= $this->Html->link(__('Reports'), ['controller'=>'Reports','action' => 'index']) ?>
                    </li>
                    <?php endif; ?>
                    <?php if($userLevel==2 || $userLevel==1 ):?>
                    <li><?= $this->Html->link(__('Search Customers'), ['controller'=>'Customers','action' => 'search']) ?>
                    </li>
                    <?php endif;?>
                    
                </ul>
            </nav>
            <?php endif;?>
            <?= $this->fetch('content') ?>
        </div>
        <footer>
        <script type="text/javascript">
  $('select').select2({tags: true});
  $(".js-example-basic-multiple").select2();
</script>
        </footer>
    </body>
</html>
