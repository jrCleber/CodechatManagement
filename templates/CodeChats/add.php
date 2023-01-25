<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CodeChat $codeChat
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $servers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Code Chats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="codeChats form content">
            <?= $this->Form->create($codeChat) ?>
            <fieldset>
                <legend><?= __('Add Code Chat') ?></legend>
                <?php
                    echo $this->Form->control('numero');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('server_id', ['options' => $servers]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
