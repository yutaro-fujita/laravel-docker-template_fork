# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
- SELECT * FROM todos;
### Todoモデルのallメソッドの返り値は何か
- Illuminate\Database\Eloquent\Collection インスタンス
### 配列の代わりにCollectionクラスを使用するメリットは
- とくにこのEloquent\Collectionの場合、データベース操作の様々なメソッドが使用可能になります。
### view関数の第1・第2引数の指定と何をしているか
- 第一引数：bladeファイルの指定(views以下から.区切り"blade.php"直前まで)
- bladeファイルに渡すデータ[key => value]
### index.blade.phpの$todos・$todoに代入されているものは何か
- $todosの中身はテーブルtodosの各レコードを含む配列です。
- $todoの中身$各レコード(連想配列)です

## Todo作成機能

### Requestクラスのallメソッドは何をしているか
リクエストデータ（今回はPOST）の中身を取得し連想配列の形で返します。
### fillメソッドは何をしているか
- todoモデルインスタンスへの$inputの代入です。
### $fillableは何のために設定しているか
- Mass Assignment(一括代入)を使う場合、検証ツールなどでのID偽装データが登録されてしまうため、その防止です。シンプルに意図しないデータのfill(todoモデルインスタンスへの代入)を許さない効果もあります。
### saveメソッドで実行しているSQLは何か
- INSERT INTO todos (content) VALUES ('入力値');
### redirect()->route()は何をしているか
- 指定ルートへのリダイレクトです。
## その他

### テーブル構成をマイグレーションファイルで管理するメリット
- SQL文の文法的理解がなくてもテーブルをCREATEできる。
- 構成の共有が容易
### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
- up(): php artisan migrate
- down(): php artisan migrate:rollback
### Seederクラスの役割は何か
- テーブルのレコード初期化、テストデータ挿入
- 同じくSQLの構文理解なしでTRUNCATEとINSERTがつかえる
- テスト環境の標準化にやくだつ（おなじレコード内容の再現）
### route関数の引数・返り値・使用するメリット
- 引数は1.名前付きルート、2.省略可能、ルート定義でパスに指定した引数またはGETで渡すデータの指定[key => value]
- 返り値は文字列です。
- メリットは、bladeファイルやcontrollerなどで名前付きルートを呼び出せ、記述の冗長化の回避や保守性の確保が期待できることです。
### @extends・@section・@yieldの関係性とbladeを分割するメリット
- @extends: 継承元の指定
- @section: baseファイルのyieldと対応させる、各ファイルの個別記述の内容を定義。@endsectionまで。
- @yield: baseファイルに記述。各ファイルの個別記述となる枠を定義。
- 繰り返しの記述を最小限におさえ保守性を高める効果があります。
### @csrfは何のための記述か
- トークン生成と認証でformリクエスト時のcsrf対策をやってくれます。
### {{ }}とは何の省略系か
- function e($text){
  return htmlspecialchars($text, EN_QUOTE, 'UTF-8'); //エスケープ処理
}
<!= e() !>

