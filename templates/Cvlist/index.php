<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cvlist[] $cvlists
 */
?>
<div class="cvlist index content">
    <?= $this->Html->link(__('New Cvlist'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cvlist') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('info_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cvlists as $cvlist): ?>
                <tr>
                    <td><?= $this->Number->format($cvlist->id) ?></td>
                    <td><?= $cvlist->hasValue('info') ? $this->Html->link($cvlist->info->id, ['controller' => 'Infos', 'action' => 'view', $cvlist->info->id]) : '' ?></td>
                    <td><?= h($cvlist->title) ?></td>
                    <td><?= h($cvlist->created) ?></td>
                    <td><?= h($cvlist->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cvlist->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cvlist->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cvlist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cvlist->id)]) ?>
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
