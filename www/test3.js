function double(obj) {
 var new_obj={};

  for(prop in obj){
    new_obj[prop] = obj[prop]*2;
  }
  return new_obj;
}

var obj = {hoge:1, fuga:2, boke:3};
console.log(obj);
console.log(double(obj));
