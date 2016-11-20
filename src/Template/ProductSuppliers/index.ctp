<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Supplier'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productSuppliers index large-9 medium-8 columns content">
    <h3><?= __('Product Suppliers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('product_id') ?></th>
                <th><?= $this->Paginator->sort('supplier_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productSuppliers as $productSupplier): ?>
            <tr>
                <td><?= $productSupplier->has('product') ? $this->Html->link($productSupplier->product->name, ['controller' => 'Products', 'action' => 'view', $productSupplier->product->id]) : '' ?></td>
                <td><?= $productSupplier->has('supplier') ? $this->Html->link($productSupplier->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $productSupplier->supplier->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productSupplier->product_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productSupplier->product_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productSupplier->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productSupplier->product_id)]) ?>
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
