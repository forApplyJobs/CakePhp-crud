<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Experience $experience
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Experience'), ['action' => 'edit', $experience->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Experience'), ['action' => 'delete', $experience->id], ['confirm' => __('Are you sure you want to delete # {0}?', $experience->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Experiences'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Experience'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="experiences view content">
            <h3><?= h($experience->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cvlist') ?></th>
                    <td><?= $experience->hasValue('cvlist') ? $this->Html->link($experience->cvlist->title, ['controller' => 'Cvlist', 'action' => 'view', $experience->cvlist->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($experience->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($experience->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($experience->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($experience->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($experience->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
