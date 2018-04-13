<form action="." method="post">
<h2 name="title">{$app.title}</h2>
   <p>
     <ul>
       <li name="count">写真枚数：{$app.count}枚</li>
       <li name="release_date" name="end_date">公開期間：{$app.release_date}〜{$app.end_date}</li>
     </ul>
   </p>
   <p>
     <input align="right" type="submit" name="action_upload_do" value="確認"/><br>
   </p>
</form>
