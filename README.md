# 29_白土拓実_初級課題
## tweetに対する通報ボタンの作成

### 仕様説明
- favorite buttonの横に通報ボタンが表示されている
- 通報ボタンはユーザごとに一回まで押せ、通報済みの通報ボタンを押すと、通報状態から通報していない状態に変化する。(favorite buttonと同じ)
- 通報ボタンは押されていない状態では黒色、押された後には黄色になる。
- 通報ボタンの横には基本的に通報人数が表示されている
- 3人に通報されている状態だと通報ボタンの隣にある数字が消える
- 隣の数字が消えた状態(上記の状態)の通報ボタンを押すと、対象のtweetが削除される。

### 動画の名称
DEC_Phase01/29/29_白土拓実_movie.mov

### 動画の説明
1. 不適切なツイートが存在し、それを消去したい
2. まず一人目が通報ボタンを押す。その際に、通報ボタンを解除することもできることを示す
3. ログアウトをした後に二人目のユーザとしてログインする。
4. 同じように通報ボタンを押す。
5. ログアウトをして3人目のユーザとしてログイン
6. 通報ボタンを押す。これで、3つの通報が溜まった。
7. 4人目のユーザとしてログインし、通報ボタンを確認すると横の数字が消滅している。
8. 通報ボタンを押すと該当するtweetが削除された。

### 工夫した点
- 通報ボタンを押した時の動作を4回目と3回目の間で変更させた点

### 苦労した点
- 通報ボタンに関するテーブルを用意する点