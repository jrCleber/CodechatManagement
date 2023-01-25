<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CodeChat> $codeChats
 */
?>
<div class="codeChats index content">
    <?= $this->Html->link(__('New Code Chat'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Code Chats') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>

                    <th><?= $this->Paginator->sort('Number') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('server_id') ?></th>
                    <th><?= $this->Paginator->sort('api_key') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($codeChats as $codeChat): ?>
                <tr>
                    <td><?= h($codeChat->numero) ?></td>
                    <td><?= $codeChat->has('user') ? $this->Html->link($codeChat->user->email, ['controller' => 'Users', 'action' => 'view', $codeChat->user->id]) : '' ?></td>
                    <td><?= $codeChat->has('server') ? $this->Html->link($codeChat->server->nome, ['controller' => 'Servers', 'action' => 'view', $codeChat->server->id]) : '' ?></td>
                    <td><?= h($codeChat->api_key) ?></td>
                    <td><?= h($codeChat->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $codeChat->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $codeChat->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $codeChat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $codeChat->id)]) ?>
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
