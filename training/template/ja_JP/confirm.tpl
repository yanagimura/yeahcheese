<form action="." method="post">
<h2>イベント作成</h2>
   <p>
     <ul>
       <li name="count">写真枚数：{$app.count}枚</li>
       <li>公開期間：
         <div name="release_date">{$app.release_date}〜</div>
         <div name="end_date">{$app.end_date}</div>
       </li>
     </ul>
   </p>
   <p>
     <input align="right" type="submit" name="action_upload_do" value="確認"/><br>
   </p>
</form>
