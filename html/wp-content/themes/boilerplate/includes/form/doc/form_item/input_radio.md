```html
<div class="block_form">
  <!-- Form Table Start-->
  <div class="form_table">

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

  </div>
  <!-- Form Table End -->
  <!-- Submit Button Start -->
  [submit "送信"]
  <!-- Submit Button End -->
</div>
```