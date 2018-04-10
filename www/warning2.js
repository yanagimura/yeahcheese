$(function() {
$('.submit').on('click', function(e) {
  if($('.name').val() === ""){
    e.preventDefault();
    $('.name').css(
      {'background-color':'red'}
    );
    $('.warning_name').text('please input name');
  }

  if($('.age').val() === ""){
    e.preventDefault();
    $('.age').css(
      {'background-color':'red'}
    );
    $('.warning_age').text('please input age');
  }

})
})
