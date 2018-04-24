{form enctype="file"}
{csrfid}
<h2>イベント作成</h2>
   <p>
     イベント名：{form_input name="title"}{message name="title"}
   </p>
   <p>
     公開開始日：{form_input type="date" name="release_date"}{message name="release_date"}</input>
   </p>
   <p>
     公開終了日：{form_input type="date" name="end_date"}{message name="end_date"}</input>
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
{/form}
