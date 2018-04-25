  <h2>{$app.title}</h2>
  <p>
    {foreach from=$app.pictureArray item=picture}
    <a href="?action_image=true&pictureFileName={$picture.filename}" rel="lightbox">
      <img src="?action_image=true&pictureFileName={$picture.filename}" width="200" height="200" style="object-fit: cover;"/>
    </a>
    {/foreach}
  </p>
  <a href="?action_viewer_logout=true">ログアウト</a>
