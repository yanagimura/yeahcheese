<form action="." method="post" enctype="multipart/form-data">
{csrfid}
<h2>イベント作成</h2>
   <p>
     イベント名：<input type="text" name="title" value="{$form.title}">{message name="title"}</input>
   </p>
   <p>
     公開開始日：<input type="date" name="release_date" value="{$form.release_date}">{message name="release_date"}</input>
   </p>
   <p>
     公開終了日：<input type="date" name="end_date" value="{$form.end_date}">{message name="end_date"}</input>
   </p>
   <p>
     <input type="file" accept="image/jpeg" name="picture_array[]" multiple value="{$form.picture_array}">{message name="picture_array"}</input><br/>
     <ul>
       <li>
         .jpegまたは.jpgのみ
       </li>
       <li>
         1枚5MB以下
       </li>
     </ul>

   </p>
   <p>
     <input type="submit" name="action_create_do" value="次へ"/><br>
   </p>
   <p>
     <a href="?action_home=true">ホームへ</a>
   </p>
</form>
