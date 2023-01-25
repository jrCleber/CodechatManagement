<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Server> $servers
 */
?>
<div class="servers index content">
    <?= $this->Html->link(__('New Server'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Servers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('url') ?></th>
                    <th><?= $this->Paginator->sort('api_geral') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($servers as $server): ?>
                <tr>
                    <td><?= $this->Number->format($server->id) ?></td>
                    <td><?= h($server->nome) ?></td>
                    <td><?= h($server->url) ?></td>
                    <td><?= h($server->api_geral) ?></td>
                    <td><?= h($server->created) ?></td>
                    <td><?= h($server->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $server->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $server->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $server->id], ['confirm' => __('Are you sure you want to delete # {0}?', $server->id)]) ?>
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
