<form action="." method="post">
  <p>
  認証キー入力
  </p>
  <p>
    {csrfid}
    <input type="text" name="authentication_key" value="{$form.authentication_key}">{message name="authentication_key"}</input>
  </p>
  <p>
    <input type="submit" name="action_owner_authenticate" value="閲覧する"/><br>
  </p>
</form>