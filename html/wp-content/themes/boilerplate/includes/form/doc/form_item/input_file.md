```html
<div class="block_form">
  <!-- Form Table Start-->
  <div class="form_table">

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

  </div>
  <!-- Form Table End -->
  <!-- Submit Button Start -->
  [submit "送信"]
  <!-- Submit Button End -->
</div>
```
