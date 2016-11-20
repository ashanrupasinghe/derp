<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Supplier'), ['action' => 'edit', $productSupplier->product_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Supplier'), ['action' => 'delete', $productSupplier->product_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productSupplier->product_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Suppliers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Supplier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productSuppliers view large-9 medium-8 columns content">
    <h3><?= h($productSupplier->product_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Product') ?></th>
            <td><?= $productSupplier->has('product') ? $this->Html->link($productSupplier->product->name, ['controller' => 'Products', 'action' => 'view', $productSupplier->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Supplier') ?></th>
            <td><?= $productSupplier->has('supplier') ? $this->Html->link($productSupplier->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $productSupplier->supplier->id]) : '' ?></td>
        </tr>
    </table>
</div>
