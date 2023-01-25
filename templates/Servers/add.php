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
            <?= $this->Html->link(__('List Servers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="servers form content">
            <?= $this->Form->create($server) ?>
            <fieldset>
                <legend><?= __('Add Server') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('url');
                    echo $this->Form->control('api_geral');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
