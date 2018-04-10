document.addEventListener('DOMContentLoaded', function() {
var elem = document.querySelectorAll('.submit');
var elem_name = document.querySelectorAll('.name');
var elem_age = document.querySelectorAll('.age');
var elem_name_warning = document.querySelectorAll('.warning_name');
var elem_age_warning = document.querySelectorAll('.warning_age');

console.log(document.querySelectorAll('input.name'));

elem[0].addEventListener('click', function(e) {
  if(elem_name[0].value === ""){
    e.preventDefault();
    elem_name[0].style['background-color'] = 'red';
    elem_name_warning[0].innerHTML = "please input name";
  }
  if(elem_age[0].value === ""){
    e.preventDefault();
    elem_age[0].style['background-color'] = 'red';
    elem_age_warning[0].innerHTML = "please input age";
  }
});
});
