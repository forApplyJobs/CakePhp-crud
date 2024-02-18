<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Info> $infos
 */
?>
<div class="infos index content">
    <?= $this->Html->link(__('New Info'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Infos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($infos as $info): ?>
                <tr>
                    <td><?= $this->Number->format($info->id) ?></td>
                    <td><?= h($info->first_name) ?></td>
                    <td><?= h($info->last_name) ?></td>
                    <td><?= h($info->email) ?></td>
                    <td><?= h($info->phone) ?></td>
                    <td><?= h($info->created) ?></td>
                    <td><?= h($info->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $info->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $info->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $info->id], ['confirm' => __('Are you sure you want to delete # {0}?', $info->id)]) ?>
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
