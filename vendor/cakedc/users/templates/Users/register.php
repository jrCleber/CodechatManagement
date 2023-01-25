<?php

use Cake\Core\Configure;

if (Configure::read('registro.register') == 'off'){
    $this->disableAutoLayout();
}else{
?>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __d('cake_d_c/users', 'Add User') ?></legend>
        <?php
        echo $this->Form->control('username', ['label' => __d('cake_d_c/users', 'Username')]);
        echo $this->Form->control('email', ['label' => __d('cake_d_c/users', 'Email')]);
        echo $this->Form->control('password', ['label' => __d('cake_d_c/users', 'Password')]);
        echo $this->Form->control('password_confirm', [
            'required' => true,
            'type' => 'password',
            'label' => __d('cake_d_c/users', 'Confirm password')
        ]);
        echo $this->Form->control('first_name', ['label' => __d('cake_d_c/users', 'First name')]);
        echo $this->Form->control('last_name', ['label' => __d('cake_d_c/users', 'Last name')]);
        if (Configure::read('Users.Tos.required')) {
            echo $this->Form->control('tos', ['type' => 'checkbox', 'label' => __d('cake_d_c/users', 'Accept TOS conditions?'), 'required' => true]);
        }
        if (Configure::read('Users.reCaptcha.registration')) {
            echo $this->User->addReCaptcha();
        }
        ?>
    </fieldset>
    <?= $this->Form->button(__d('cake_d_c/users', 'Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php
}
    ?>
