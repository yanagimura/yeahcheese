document.addEventListener('DOMContentLoaded', function() {

document.getElementById('textbox').addEventListener('keyup',function(){
  //var url = '/hint.php?q=' + element[0].value;
  var result = document.getElementById('result');
  var xhr = new XMLHttpRequest();

  xhr.addEventListener('loadstart', function(){
    result.textContent = 'loading';
  },false);

  xhr.addEventListener('load', function(){

    var data = JSON.parse(xhr.responseText);
    console.log(data);
    if(data === null){
      result.textContent = " no result";
    } else {
      var ul = document.createElement('ul');
      data.forEach(function(value){
        var li = document.createElement('li');
        li.textContent =value;
        ul.appendChild(li);
      });
      result.replaceChild(ul, result.firstChild);
    }

  },false);

  xhr.addEventListener('error', function(){
    result.textContent('error occured');
  }, false);
  xhr.open('GET', 'hint.php?q='
  + encodeURIComponent(document.getElementById('textbox').value),true);
  xhr.responseType = 'text';
  xhr.send(null);

  });


}, false);
