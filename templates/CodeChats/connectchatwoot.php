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
            <?php
            echo $this->Form->create(null, [
                'url' => [
                    'controller' => 'code-chats',
                    'action' => 'chatwoot'
                ]
            ]);
            ?>
            <fieldset>
                <legend><?= __('Add Code Chat') ?></legend>
                <?php
                echo $this->Form->control('inbox_name');
                echo $this->Form->control('user_token_api');
                echo $this->Form->control('account_chatwot');
                ?>
                <?php echo '<input type="hidden" name="idCodechat" value="'.$codeChat->id.'" id="nome" />'; ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
