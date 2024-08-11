```html
<div class="block_form">
  <!-- Form Table Start-->
  <div class="form_table">
    <!-- .table_tr ここから -->
    <div class="table_tr">
      <div class="table_th require">
        <label for="your-name" class="form_table_label">
          お名前
        </label>
      </div>
      <div class="table_td">
        [text* your-name autocomplete:name id:your-name placeholder "田中太郎"]
      </div>
    </div>
    <!-- .table_tr ここまで -->
    <!-- .table_tr ここから -->
    <div class="table_tr">
      <div class="table_th require">
        <label for="your-email" class="form_table_label">
          メールアドレス
        </label>
      </div>
      <div class="table_td">
        [email* your-email autocomplete:name id:your-email placeholder "example@example.com"]
      </div>
    </div>
    <!-- .table_tr ここまで -->
    <!-- .table_tr ここから -->
    <div class="table_tr">
      <div class="table_th require">
        <label for="your-tel" class="form_table_label">
          電話番号
        </label>
      </div>
      <div class="table_td">
        [tel* your-tel autocomplete:name id:your-tel placeholder "090-1234-5678"]
      </div>
    </div>
    <!-- .table_tr ここまで -->
    <!-- .table_tr ここから -->
    <div class="table_tr">
      <fieldset class="table_fieldset">
        <legend class="table_th require">
          ラジオボタン<br class="pc">(横並び)
        </legend>
        <div class="table_td">
          [radio your_dog1 id:your_dog1 use_label_element default:1 "プードル" "チワワ" "ダルメシアン" "パピヨン" "ラブラドール"]
        </div>
      </fieldset>
    </div>
    <!-- .table_tr ここまで -->
    <!-- .table_tr ここから -->
    <div class="table_tr">
      <fieldset class="table_fieldset">
        <legend class="table_th require">
          ラジオボタン<br class="pc">(縦並び)
        </legend>
        <div class="table_td">
          [radio your_dog2 id:your_dog2 class:item_block_pc class:item_block_sp use_label_element default:1 "プードル" "チワワ" "ダルメシアン" "パピヨン" "ラブラドール"]
        </div>
      </fieldset>
    </div>
    <!-- .table_tr ここまで -->
    <!-- .table_tr ここから -->
    <div class="table_tr">
      <fieldset class="table_fieldset">
        <legend class="table_th require">
          チェックボックス<br class="pc">(横並び)
        </legend>
        <div class="table_td">
          [checkbox* your_dog3 id:your_dog3 use_label_element "プードル" "チワワ" "ダルメシアン" "パピヨン" "ラブラドール"]
        </div>
      </fieldset>
    </div>
    <!-- .table_tr ここまで -->
    <!-- .table_tr ここから -->
    <div class="table_tr">
      <fieldset class="table_fieldset">
        <legend class="table_th require">
          チェックボックス<br class="pc">(縦並び)
        </legend>
        <div class="table_td">
          [checkbox* your_dog4 id:your_dog4 class:item_block_pc class:item_block_sp use_label_element  "プードル" "チワワ" "ダルメシアン" "パピヨン" "ラブラドール"]
        </div>
      </fieldset>
    </div>
    <!-- .table_tr ここまで -->
    <!-- .table_tr ここから -->
    <div class="table_tr">
      <div class="table_th require">
        <label for="your-file" class="form_table_label">
          画像ファイル
        </label>
      </div>
      <div class="table_td">
        <div class="form_file" data-form-file="wrapper">
          <div class="file_wrap">
            <button type="button" class="file_button" data-form-file-for="your-file">ファイルを選択</button>
            <p class="file_name" data-form-file-text-default>選択されていません</p>
          </div>
          [file* your-file limit:1mb filetypes:.jpg|.img|.gif|.png|.svg|.tiff id:your-file tabindex:-1]
        </div>
      </div>
    </div>
    <!-- .table_tr ここまで -->
    <!-- .table_tr ここから -->
    <div class="table_tr">
      <div class="table_th require">
        <label for="your-select" class="form_table_label">
          セレクトボックス
        </label>
      </div>
      <div class="table_td">
        [select* your-select first_as_label id:your-select "選択してください" "アメリカンカール" "ペルシャ" "ロシアンブルー" "ボンペイ"]

      </div>
    </div>
    <!-- .table_tr ここまで -->
  </div>
  <!-- Form Table End -->
  <!-- Submit Button Start -->
  [submit "送信"]
  <!-- Submit Button End -->
</div>
```
