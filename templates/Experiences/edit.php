<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Experience $experience
 * @var string[]|\Cake\Collection\CollectionInterface $cvlist
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $experience->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $experience->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Experiences'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="experiences form content">
            <?= $this->Form->create($experience) ?>
            <fieldset>
                <legend><?= __('Edit Experience') ?></legend>
                <?php
                    echo $this->Form->control('cvlist_id', ['options' => $cvlist, 'empty' => true]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
