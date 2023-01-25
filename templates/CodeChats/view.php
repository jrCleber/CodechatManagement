<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CodeChat $codeChat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('SCANNER QRCode'), ['action' => 'qrcode', $codeChat->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Connect to Chatwoot with API'), ['action' => 'connectchatwoot', $codeChat->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Edit Code Chat'), ['action' => 'edit', $codeChat->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Code Chat'), ['action' => 'delete', $codeChat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $codeChat->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Code Chats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Code Chat'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="codeChats view content">
            <h3><?= h($codeChat->id) ?> - Connection Status: <?= $conexao['state'] ?></h3>
            <table>
                <tr>
                    <th><?= __('Numero') ?></th>
                    <td><?= h($codeChat->numero) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $codeChat->has('user') ? $this->Html->link($codeChat->user->email, ['controller' => 'Users', 'action' => 'view', $codeChat->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Server') ?></th>
                    <td><?= $codeChat->has('server') ? $this->Html->link($codeChat->server->url, ['controller' => 'Servers', 'action' => 'view', $codeChat->server->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Api') ?></th>
                    <td><?=
                        '<textarea>'.h($codeChat->api).'</textarea>' ?></td>
                </tr>
                <tr>
                    <th><?= __('Api Key and Instance Name:') ?></th>
                    <td><?= h($codeChat->api_key) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($codeChat->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($codeChat->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($codeChat->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Chatwoots') ?></h4>
                <?php if (!empty($codeChat->chatwoots)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Code Chat Id') ?></th>
                            <th><?= __('Inbox') ?></th>
                            <th><?= __('User Api') ?></th>
                            <th><?= __('Account Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($codeChat->chatwoots as $chatwoots) : ?>
                        <tr>
                            <td><?= h($chatwoots->code_chat_id) ?></td>
                            <td><?= h($chatwoots->inbox) ?></td>
                            <td><?= h($chatwoots->user_api) ?></td>
                            <td><?= h($chatwoots->account_id) ?></td>
                            <td><?= h($chatwoots->created) ?></td>
                            <td><?= h($chatwoots->modified) ?></td>
                            <td><?= h($chatwoots->id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Chatwoots', 'action' => 'view', $chatwoots->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Chatwoots', 'action' => 'edit', $chatwoots->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Chatwoots', 'action' => 'delete', $chatwoots->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chatwoots->id)]) ?>
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
