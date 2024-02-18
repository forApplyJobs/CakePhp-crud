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
            <?= $this->Html->link(__('Edit Bilka'), ['action' => 'edit', $bilka->yas], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bilka'), ['action' => 'delete', $bilka->yas], ['confirm' => __('Are you sure you want to delete # {0}?', $bilka->yas), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bilka'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bilka'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="bilka view content">
            <h3><?= h($bilka->yas) ?></h3>
            <table>
                <tr>
                    <th><?= __('Yas') ?></th>
                    <td><?= $this->Number->format($bilka->yas) ?></td>
                </tr>
                <tr>
                    <th><?= __('Boy') ?></th>
                    <td><?= $this->Number->format($bilka->boy) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Ad') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($bilka->ad)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Soyad') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($bilka->soyad)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
