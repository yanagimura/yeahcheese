  <h2>イベント一覧</h2>
  <p>
    {foreach from=$app.event_array item=event}
    {$event.title}
    <br />
    公開期間：{$event.release_date}〜{$event.end_date}　写真枚数：{$event.count}　認証キー：{$event.authentication_key}
    {/foreach}
    <a href="">編集</a>
  </p>
