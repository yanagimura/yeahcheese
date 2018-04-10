function double(arr) {
  for (var i = 0; i < arr.length; i++) {
    arr[i] = arr[i] * 2;
  }
  return arr;
}

var arr = [1, 2, 3];
console.log(arr);
console.log(double(arr));
