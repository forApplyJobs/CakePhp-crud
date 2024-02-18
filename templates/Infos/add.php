<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Info $info
 */
?>
<div class="infos form content">
    <?= $this->Form->create($info) ?>
    <fieldset>
        <legend><?= __('Add Info') ?></legend>
        <?php
            echo $this->Form->control('header');
            echo $this->Form->control('description', ['rows' => 4]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
