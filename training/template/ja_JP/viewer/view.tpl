  <h2>イベント写真一覧</h2>
  <p>
    {foreach from=$app.picture_array item=picture}
    <a href="{$picture.filename}" rel="lightbox">
      <img src="{$picture.filename}" width="200" height="200" style="object-fit: cover;"/>
    </a>
    {/foreach}
  </p>
  <a href="?action_viewer_logout=true">ログアウト</a>
