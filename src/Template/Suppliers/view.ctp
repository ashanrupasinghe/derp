<div class="suppliers view large-10 medium-10 columns content">
    <h3><?= h($supplier->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $supplier->has('user') ? $this->Html->link($supplier->user->id, ['controller' => 'Users', 'action' => 'view', $supplier->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('FirstName') ?></th>
            <td><?= h($supplier->firstName) ?></td>
        </tr>
        <tr>
            <th><?= __('LastName') ?></th>
            <td><?= h($supplier->lastName) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($supplier->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($supplier->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= h($supplier->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= h($supplier->longitude) ?></td>
        </tr>
        <tr>
            <th><?= __('ContactNo') ?></th>
            <td><?= h($supplier->contactNo) ?></td>
        </tr>
        <tr>
            <th><?= __('MobileNo') ?></th>
            <td><?= h($supplier->mobileNo) ?></td>
        </tr>
        <tr>
            <th><?= __('FaxNo') ?></th>
            <td><?= h($supplier->faxNo) ?></td>
        </tr>
        <tr>
            <th><?= __('CompanyName') ?></th>
            <td><?= h($supplier->companyName) ?></td>
        </tr>
        <tr>
            <th><?= __('RegNo') ?></th>
            <td><?= h($supplier->regNo) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($supplier->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplier->id) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= $this->Number->format($supplier->city) ?></td>
        </tr>
    </table>
</div>
