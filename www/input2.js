$(function() {

$('#textbox').on('keyup',function(){
  //var url = '/hint.php?q=' + element[0].value;
  $.ajax(
    {
      type: 'GET',
      url: 'hint.php?q=' + $('#textbox').val()
    }
  ).then(function(response){
    var data = JSON.parse(response);
      data.forEach(function(value){
        var li = $('<li></li>');
        $('#result').append($('<ul></ul>').append(li.html(value)));
      })
  })

  })
})
