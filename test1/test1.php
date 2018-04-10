<?php

class Person {
    public $name = 'person'; //プロパティ
    private $birthYear = '1999'; // privateなプロパティ
    public function getBirthYear() {
		return $this->birthYear;
        }
}

class Employee extends Person {
	private $salary;
	// コンストラクタ
	function __construct($salary) {
		$this->salary = $salary;
        }
	public function getSalary() {
		return $this->salary;
        }
}

$employee = new Employee(1000);
echo $employee->getBirthYear() . "\n";     // 親クラスのメソッドを呼び出し可
echo $employee->getSalary() . "\n";
