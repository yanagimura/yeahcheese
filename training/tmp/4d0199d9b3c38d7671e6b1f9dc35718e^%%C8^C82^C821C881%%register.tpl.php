<?php /* Smarty version 2.6.31, created on 2018-04-10 17:40:53
         compiled from register.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'register.tpl', 4, false),)), $this); ?>
<form action="." method="post">
<h2>会員登録</h2>
   <p>
     メールアドレス: <input type="text" name="mailaddress" value="<?php echo $this->_tpl_vars['form']['mailaddress']; ?>
"><?php echo smarty_function_message(array('name' => 'mailaddress'), $this);?>
</input>
   </p>
   <p>
     パスワード: <input type="text" name="password" value="<?php echo $this->_tpl_vars['form']['password']; ?>
"><?php echo smarty_function_message(array('name' => 'password'), $this);?>
</input>
   </p>
   <p>
     パスワード（確認用）: <input type="text" name="password_confirm" "<?php echo $this->_tpl_vars['form']['password_confirm']; ?>
"><?php echo smarty_function_message(array('name' => 'password_confirm'), $this);?>
</input>
   </p>
   <p>
     <input type="submit" name="action_register_do" value="登録"/>
   </p>
</form>