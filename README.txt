# 課題

## 課題

このファイル（```readme.md```）を書き換えて提出しなさい。

まず、

http://localhost/simple-bbs-ユーザ名/

を開いて、掲示板システムの基本動作を確認しなさい。

そのうえで、```index.php``` を中心に、出力を整形したり、必要な情報を付け加えたりして、掲示板システムを完成させなさい。

できそうなこと
- 出力を表形式にする（HTML）
- あちこちのページを、もうすこしマシなデザインにする（HTML/CSS)
- 評価の数字に制限を加える（いまは「一万点」でも「マイナス１００点」でも入れられます） (PHP)
- 自分の書き込みは評価させない (PHP)


余裕がある人は、```sample.php``` を参照して、書き込みの評価を ```index.php``` に入れ込む・評価の低い書き込みは表示しないなど、独自の機能を入れてみなさい。

```sample.php``` で実行されている SQL：

```
select mid, body, messages.uid as uid, coalesce(avg(eval),0) as av, count(*) as count from evals
  right join messages using(mid)
  left join users on messages.uid=users.uid
  group by mid
  order by mid asc
```

- ```coalesce``` は、値がない（NULL）のときに別の値を使う関数
- ```right join``` は、左側に値がなくてもよい。```left join``` は、右側に値がなくてもよい。```inner join``` は、両側に値がなければならない。今回、evals に値がなくても、messages からデータを引っ張ってきたいので、```right join``` が適切
- avg, sum, count などの集計関数は、```group by``` 節を伴って、グループごとの集計値を計算する。

## データベース構造を変更したい人に

shared データベースの他に、各個人のデータベースにも、messages, users, evals のテーブルを作成しておきました。database.php の接続時に、shared でなく、自分のデータベースを指定することができます。自分のデータベースのテーブル構造は自由に変更して構いません（共通データベースを破壊しないよう注意してください）


# 独自機能（「このようにチャレンジしたが動かなかった」も含めてよい）
