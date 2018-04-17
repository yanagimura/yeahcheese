<form action="." method="post">
<h2 name="title">{$app.title}</h2>
   <p>
     <ul>
       <li name="count">写真枚数：{$app.count}枚</li>
       <li name="release_date" name="end_date">公開期間：{$app.release_date}〜{$app.end_date}</li>
     </ul>
   </p>
   <p>
    {foreach from=$app.picture_array item=picture}
        <img src="{$picture}" width="200" height="200">
    {/foreach}
   </p>
   <p>
     <input type="submit" name="action_confirm" value="アップロード"/>
     <input type="submit" name="action_create" value="戻る" />
   </p>
</form>
