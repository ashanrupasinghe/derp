<div class="orders view large-10 medium-10 columns content">
    <h3><?= h($order->id) ?></h3>
    <table class="vertical-table">
            <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th><?= __('CustomerId') ?></th>
            <td><?= $this->Number->format($order->customerId) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($order->address) ?></td>
        </tr>
  <!--      <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= h($order->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= h($order->longitude) ?></td>
        </tr>-->
        
        <tr>
            <th><?= __('PaymentStatus') ?></th>
            <td><?= h($order->paymentStatus) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($order->status) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= $this->Number->format($order->city) ?></td>
        </tr>
        <tr>
            <th><?= __('CallcenterId') ?></th>
            <td><?= $this->Number->format($order->callcenterId) ?></td>
        </tr>
        <tr>
            <th><?= __('DeliveryId') ?></th>
            <td><?= $this->Number->format($order->deliveryId) ?></td>
        </tr>
        <tr>
            <th><?= __('SubTotal') ?></th>
            <td><?= $this->Number->format($order->subTotal) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax') ?></th>
            <td><?= $this->Number->format($order->tax) ?></td>
        </tr>
        <tr>
            <th><?= __('Discount') ?></th>
            <td><?= $this->Number->format($order->discount) ?></td>
        </tr>
        <tr>
            <th><?= __('CouponCode') ?></th>
            <td><?= h($order->couponCode) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($order->total) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($order->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($order->modified) ?></td>
        </tr>
    </table>
    <!--<div class="related">
        <h4><?= __('Related Order Products') ?></h4>
        <?php if (!empty($order->order_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Order Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->order_products as $orderProducts): ?>
            <tr>
                <td><?= h($orderProducts->order_id) ?></td>
                <td><?= h($orderProducts->product_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderProducts', 'action' => 'view', $orderProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderProducts', 'action' => 'edit', $orderProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderProducts', 'action' => 'delete', $orderProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>-->
</div>
