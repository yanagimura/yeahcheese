{form enctype="file" ethna_action="edit"}
  <h2>イベント内容編集</h2>
  <p>
    認証キー：{$app.authentication_key}
  </p>
  <p>
    イベント名：{form_input name="title"}{message name="title"}
  </p>
  <p>
    公開開始日：{form_input type="date" name="release_date"}{message name="release_date"}
  </p>
  <p>
    公開終了日：{form_input type="date" name="end_date"}{message name="end_date"}
  </p>
  <p>
    追加ファイル：
    {form_input type="file" accept="image/jpeg" multiple="multiple" name="picture_array"}{message name="picture_array"}
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
    <img src="{$picture}" width="200" height="200" style="object-fit: cover;"/>
    <input type="submit" name="delete" value="削除" />&emsp;
    {/foreach}
  </p>
{/form}
