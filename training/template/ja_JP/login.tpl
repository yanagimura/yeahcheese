<form action="." method="post">
<h2>ログイン</h2>
   <p>
     メールアドレス: <input type="text" name="mailaddress" value="{$form.mailaddress}">{message name="mailaddress"}</input>
   </p>
   <p>
     パスワード: <input type="text" name="password" value="{$form.password}">{message name="password"}</input>
   </p>
   <input type="submit" name="action_login_do" value="ログイン"/>
   <input type="submit" name="action_register" value="会員登録"/>
</form>
