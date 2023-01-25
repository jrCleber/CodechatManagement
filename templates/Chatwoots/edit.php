<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chatwoot $chatwoot
 * @var string[]|\Cake\Collection\CollectionInterface $codeChats
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $chatwoot->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $chatwoot->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Chatwoots'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="chatwoots form content">
            <?= $this->Form->create($chatwoot) ?>
            <fieldset>
                <legend><?= __('Edit Chatwoot') ?></legend>
                <?php
                    echo $this->Form->control('code_chat_id', ['options' => $codeChats]);
                    echo $this->Form->control('inbox');
                    echo $this->Form->control('user_api');
                    echo $this->Form->control('account_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
