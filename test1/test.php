<?php
class Person {
	public $name = 'person';  //プロパティ
	private $birthYear = '1999'; // privateなプロパティ
// メソッド
	public function getBirthYear() {
		return $this->birthYear;
}
}

$person = new Person(); // クラスからインスタンス作成
echo $person->name;     // プロパティにアクセス
echo $person->getBirthYear(); // メソッドを実行

