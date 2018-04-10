function Person(first,last) {
	this.firstname = first;
	this.lastname = last;
	this.fullname = first + ' ' + last;
}
Person.prototype.getName = function () {
	return this.fullname;
}

var person = new Person('mai', 'yanagimura');
console.log(person.getName());
