<form action="." method="post">
  <a href="?action_home=true">ホームへ戻る</a>
  <p>
    {foreach from=$app.event_array item=event}
    <h3>{$event.title}</h3>
    <br>
    公開期間：{$event.release_date}〜{$event.end_date}　写真枚数：{$event.count}　認証キー：{$event.authentication_key}
    <a href="?action_edit=true&eventno={$event.id}">編集</a><br><br>
    {/foreach}
  </p>
</form>
