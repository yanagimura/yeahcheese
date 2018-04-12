<form action="." method="post">
<h2>イベント作成</h2>
   <p>
     イベント名：<input type="text" name="title" value="{$form.title}">{message name="title"}</input>
   </p>
   <p>
     公開開始日：<input type="date" name="release_date" value="{$form.release_date}">{message name="release_date"}</input>
   </p>
   <p>
     公開終了日：<input type="date" name="end_date" "{$form.end_date}">{message name="end_date"}</input>
   </p>
   <p>
     <input type="file" name="upload_file" id="selfile"><br>
     <ul>
       <li>
         jpegのみ
       </li>
       <li>
         1枚5MB以下
       </li>
     </ul>

   </p>
   <p>
     <input type="submit" name="action_confirm_do" value="次へ"/><br>
   </p>
</form>
