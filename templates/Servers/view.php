<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Server $server
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Server'), ['action' => 'edit', $server->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Server'), ['action' => 'delete', $server->id], ['confirm' => __('Are you sure you want to delete # {0}?', $server->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Servers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Server'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="servers view content">
            <h3><?= h($server->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($server->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= h($server->url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Api Geral') ?></th>
                    <td><?= h($server->api_geral) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($server->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($server->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($server->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Code Chats') ?></h4>
                <?php if (!empty($server->code_chats)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Numero') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Server Id') ?></th>
                            <th><?= __('Api') ?></th>
                            <th><?= __('Api Key') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($server->code_chats as $codeChats) : ?>
                        <tr>
                            <td><?= h($codeChats->id) ?></td>
                            <td><?= h($codeChats->numero) ?></td>
                            <td><?= h($codeChats->user_id) ?></td>
                            <td><?= h($codeChats->server_id) ?></td>
                            <td><?= h($codeChats->api) ?></td>
                            <td><?= h($codeChats->api_key) ?></td>
                            <td><?= h($codeChats->created) ?></td>
                            <td><?= h($codeChats->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CodeChats', 'action' => 'view', $codeChats->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CodeChats', 'action' => 'edit', $codeChats->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CodeChats', 'action' => 'delete', $codeChats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $codeChats->id)]) ?>
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
