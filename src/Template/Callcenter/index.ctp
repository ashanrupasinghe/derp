
<div class="callcenter index large-10 medium-10 columns content">
    <div class="pull-right" style="float: right;">
        <?= $this->Html->link(__('Add New Callcentre Staff'), ['controller' => 'Callcenter', 'action' => 'add','class'=>'btn btn-default']) ?>
    </div>
    <h3><?= __('Callcenter') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('firstName') ?></th>
                <th><?= $this->Paginator->sort('lastName') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('mobileNo') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($callcenter as $callcenter): ?>
            <tr>
                <td><?= $this->Number->format($callcenter->id) ?></td>
                <td><?= $callcenter->has('user') ? $this->Html->link($callcenter->user->username, ['controller' => 'Users', 'action' => 'view', $callcenter->user->id]) : '' ?></td>
                <td><?= h($callcenter->firstName) ?></td>
                <td><?= h($callcenter->lastName) ?></td>
                <td><?= h($callcenter->email) ?></td>
                <td><?= h($callcenter->cid->cname) ?></td>
                <td><?= h($callcenter->mobileNo) ?></td>
                <td><?= h($callcenter->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $callcenter->id],['class'=>'x-btn x-btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $callcenter->id],['class'=>'x-btn x-btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $callcenter->id],['confirm' => __('Are you sure you want to delete # {0}?', $callcenter->id),'class'=>'x-btn x-btn-danger']) ?>
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
