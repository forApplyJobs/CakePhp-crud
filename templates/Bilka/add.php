<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bilka $bilka
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Bilka'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="bilka form content">
            <?= $this->Form->create($bilka) ?>
            <fieldset>
                <legend><?= __('Add Bilka') ?></legend>
                <?php
                    echo $this->Form->control('ad');
                    echo $this->Form->control('soyad');
                    echo $this->Form->control('boy');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
