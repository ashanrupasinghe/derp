<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $packageType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $packageType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Package Type'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="packageType form large-9 medium-8 columns content">
    <?= $this->Form->create($packageType) ?>
    <fieldset>
        <legend><?= __('Edit Package Type') ?></legend>
        <?php
            echo $this->Form->input('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
