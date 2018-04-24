<form action="." method="post">
  <a href="?action_home=true">ホームへ戻る</a>
  <br><br>
  <input type="submit" name="action_owner_delete" value="削除" />
  <p>
    {foreach from=$app.event_array item=event}
    <h3><input type="checkbox" name="event[]" value="{$event.id}"/>&emsp;{$event.title}</h3>
    公開期間：{$event.release_date}〜{$event.end_date}&emsp;写真枚数：{$event.count}&emsp;認証キー：{$event.authentication_key}
    <a href="?action_edit=true&eventno={$event.id}">編集</a><br><br>
    {/foreach}
  </p>
</form>
