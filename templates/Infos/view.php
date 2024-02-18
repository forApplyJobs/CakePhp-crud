<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Info $info
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Info'), ['action' => 'edit', $info->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Info'), ['action' => 'delete', $info->id], ['confirm' => __('Are you sure you want to delete # {0}?', $info->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Infos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Info'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="infos view content">
            <h3><?= h($info->id) ?></h3>
            <table>
            <tr>
                <th><?= __('Header') ?></th>
                <td><?= h($info->header) ?></td>
            </tr>
            <tr>
                <th><?= __('Description') ?></th>
                <td><?= h($info->description) ?></td>
            </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Cvlist') ?></h4>
                <?php if (!empty($info->cvlist)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Info Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($info->cvlist as $cvlist) : ?>
                        <tr>
                            <td><?= h($cvlist->id) ?></td>
                            <td><?= h($cvlist->info_id) ?></td>
                            <td><?= h($cvlist->title) ?></td>
                            <td><?= h($cvlist->description) ?></td>
                            <td><?= h($cvlist->created) ?></td>
                            <td><?= h($cvlist->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Cvlist', 'action' => 'view', $cvlist->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Cvlist', 'action' => 'edit', $cvlist->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cvlist', 'action' => 'delete', $cvlist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cvlist->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
