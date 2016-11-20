<?php
$availability=['0'=>'Not available','1'=>'Available'];
$status = ['0'=>'Desabled','1'=>'Active'];
                
 ?>
<div class="products index large-10 medium-10 columns content">
    <?php if($userLevel==1):?><div class="pull-right" style="float: right;">
        <?= $this->Html->link(__('Add New Product'), ['controller' => 'Products', 'action' => 'add','class'=>'btn btn-default']) ?>
    </div><?php endif;?>
    <h3><?= __('Products') ?></h3>
    
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th><?= $this->Paginator->sort('Quantity type') ?></th>
                <th><?= $this->Paginator->sort('availability') ?></th>
                <!--<th><?= $this->Paginator->sort('image') ?></th>-->
                <!--<th><?= $this->Paginator->sort('supplierId') ?></th>-->
                <th><?= $this->Paginator->sort('status') ?></th>
                <!--<th><?= $this->Paginator->sort('created') ?></th>-->
                <!--<th><?= $this->Paginator->sort('modified') ?></th>-->
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $this->Number->format($product->id) ?></td>
                    <td><?= h($product->name) ?></td>
                    <td><?= $this->Number->format($product->price) ?></td>
                    <td><?= h($package_type[$product->package]) ?></td>
                    <td><?= h($availability[$product->availability]) ?></td>
                    <!--<td><?= h($product->image) ?></td>-->
                    <!--<td><?= $this->Number->format($product->supplierId) ?></td>-->
                    <td><?= h($status[$product->status]) ?></td>
                    <!--<td><?= h($product->created) ?></td>-->
                    <!--<td><?= h($product->modified) ?></td>-->
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                       <?php if($userLevel==1||$userLevel==2):?> <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                        
                        <?php endif;?>
                                               <?php if($userLevel==1):?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                        <?php endif;?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
