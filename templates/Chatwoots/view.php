<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chatwoot $chatwoot
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Chatwoot'), ['action' => 'edit', $chatwoot->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Chatwoot'), ['action' => 'delete', $chatwoot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chatwoot->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Chatwoots'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Chatwoot'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chatwoots view content">
            <h3><?= h($chatwoot->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Code Chat') ?></th>
                    <td><?= $chatwoot->has('code_chat') ? $this->Html->link($chatwoot->code_chat->id, ['controller' => 'CodeChats', 'action' => 'view', $chatwoot->code_chat->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User Api') ?></th>
                    <td><?= h($chatwoot->user_api) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inbox') ?></th>
                    <td><?= $this->Number->format($chatwoot->inbox) ?></td>
                </tr>
                <tr>
                    <th><?= __('Account Id') ?></th>
                    <td><?= $this->Number->format($chatwoot->account_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($chatwoot->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($chatwoot->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($chatwoot->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
