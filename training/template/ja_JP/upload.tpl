<form action="." method="post">
<h2>作成完了</h2>
   <p>
     <ul>
       <li name="count">写真枚数：{$app.count}枚</li>
       <li name="release_date" name="end_date">公開期間：{$app.release_date}〜{$app.end_date}</li>
       </li>
     </ul>
   </p>
   <p>
     <div name="authentication_key">認証キー：{$app.authentication_key}</div>
   </p>
   <p>
     <input align="right" type="submit" name="action_upload" value="ホームへ"/><br>
   </p>
</form>
