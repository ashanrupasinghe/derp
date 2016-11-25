
<div class="users index large-10 medium-10 columns content">
    <div class="pull-right" style="float: right;">
        <?= $this->Html->link(__('Add New User'), ['controller' => 'Users', 'action' => 'add', 'class' => 'btn btn-default']) ?>
    </div>
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('user_type') ?></th>
                <!--<th><?= $this->Paginator->sort('password') ?></th>-->
                <!--<th><?= $this->Paginator->sort('remember_token') ?></th>-->
<!--                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>-->
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->username) ?></td>
                    <?php
                    switch ($user->user_type) {
                        case '2':
                            $user_type = 'Callcentre';
                            break;
                        case '3':
                            $user_type = 'Supplier';
                            break;
                        case '4':
                            $user_type = 'Delivery Staff';
                            break;
                        default:
                            $user_type = 'Admin';
                            break;
                    }
                    ?>
                    <td><?= h($user_type) ?></td>
                    <!--<td><?= h($user->modified) ?></td>-->
                    <td><?= h(($user->status==1?'Enabled':'Disabled')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id],['class'=>'x-btn x-btn-primary']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id],['class'=>'x-btn x-btn-warning']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class'=>'x-btn x-btn-danger']) ?>
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
