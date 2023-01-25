<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CodeChat $codeChat
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $servers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $codeChat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $codeChat->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Code Chats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="codeChats form content">
            <?= $this->Form->create($codeChat) ?>
            <fieldset>
                <legend><?= __('Edit Code Chat') ?></legend>
                <?php
                    echo $this->Form->control('numero');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('server_id', ['options' => $servers]);
                    echo $this->Form->control('api');
                    echo $this->Form->control('api_key');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
