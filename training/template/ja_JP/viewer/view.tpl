  <h2>イベント写真一覧</h2>
  <p>
    {foreach from=$app.picture_array item=picture}
    <img src="{$picture.filename}" width="200" height="200" style="object-fit: cover;"/>
    {/foreach}
  </p>
  <a href="?action_viewer_logout=true">ログアウト</a>
