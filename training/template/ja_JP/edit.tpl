<form action="." method="post" enctype="multipart/form-data">
  <h2>イベント内容編集</h2>
  <p>
    認証キー：{$app.authentication_key}
  </p>
  <p>
    イベント名：<input type="text" name="title" value="{$form.title}">{message name="title"}{$app.title}</input>
  </p>
  <p>
    公開開始日：<input type="date" name="release_date" value="{$form.release_date}">{message name="release_date"}{$app.release_date}</input>
  </p>
  <p>
    公開終了日：<input type="date" name="end_date" value="{$form.end_date}">{message name="end_date"}{$app.end_date}</input>
  </p>
  <p>
    <input type="file" accept="image/jpeg" name="picture_array[]" multiple value="{$form.picture_array}">{message name="picture_array"}</input><br/>
    <ul>
      <li>
        .jpeg または .jpgのみ
      </li>
      <li>
        1枚5MB以下
      </li>
    </ul>
  </p>
  <p>
    <input type="submit" name="update" value="更新" />
  </p>
  <p>
    {foreach from=$app.picture_array item=picture}
    <img src="images/tmp/thumb/{$picture}" />
    <input type="submit" name="delete" value="削除" />
    <br />
    {/foreach}
  </p>
</form>
