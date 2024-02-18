<?= $this->Form->create($info) ?>
<?= $this->Form->control('name') ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('phone') ?>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>