<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Bilka> $bilka
 */
?>
<div class="bilka index content">
    <?= $this->Html->link(__('New Bilka'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Bilka') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('yas') ?></th>
                    <th><?= $this->Paginator->sort('boy') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bilka as $bilka): ?>
                <tr>
                    <td><?= $this->Number->format($bilka->yas) ?></td>
                    <td><?= $this->Number->format($bilka->boy) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bilka->yas]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bilka->yas]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bilka->yas], ['confirm' => __('Are you sure you want to delete # {0}?', $bilka->yas)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
