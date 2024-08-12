
## HTML
### 通常のテキスト入力欄
```html
    <!-- BEGIN .table_tr -->
    <div class="table_tr">
      <div class="table_th require">
        <label for="text123" class="form_table_label">
          通常のテキスト入力欄
        </label>
      </div>
      <div class="table_td">
        [text* text123 id:text123 placeholder "ここに文章が入ります。"]
      </div>
    </div>
    <!-- END .table_tr -->
```

### 氏名
```html
    <!-- BEGIN .table_tr -->
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
    <!-- END .table_tr -->
```
