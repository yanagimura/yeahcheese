# セットアップ手順

## vagrant, virtualboxをインストール

https://www.virtualbox.org/wiki/Downloads
https://www.vagrantup.com/downloads.html

## vagrant-vbguestをインストール

```
vagrant plugin install vagrant-vbguest
```
　
## git clone

```
mkdir ~/sen
cd ~/sen
git clone git@github.com:sen-corporation/NewGrad.git
```

## 仮想環境作成

```
cd ~/sen/NewGrad
vagrant up
```

## 動作確認

http://10.81.22.67/phpinfo.php
にアクセス

