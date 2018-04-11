<?php /* Smarty version 2.6.31, created on 2018-04-11 10:29:31
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'login.tpl', 4, false),)), $this); ?>
<form action="." method="post">
<h2>ログイン</h2>
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
   <input type="submit" name="action_login_do" value="ログイン"/>
</form>