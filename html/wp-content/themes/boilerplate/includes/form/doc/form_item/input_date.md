
## 必要プラグイン
```php
// flatpickr
wp_enqueue_style( 'flatpickr', get_theme_file_uri( '/includes/form/lib/js/flatpickr/flatpickr.css' ), [], $form_assets_version);
wp_enqueue_script( 'flatpickr', get_theme_file_uri( '/includes/form/lib/js/flatpickr/flatpickr.js' ), ['jquery'], $form_assets_version);
wp_enqueue_script( 'flatpickr-ja', get_theme_file_uri( '/includes/form/lib/js/flatpickr/ja.js' ), ['jquery'], $form_assets_version);
```


## HTML
```html
<!-- .table_tr ここから -->
<div class="table_tr">
  <div class="table_th require">
    <label for="your-birthday1" class="form_table_label">
      生年月日
    </label>
  </div>
  <div class="table_td">
    [date* your-birthday1 id:your-birthday1]
  </div>
</div>
<!-- .table_tr ここまで -->
<!-- .table_tr ここから -->
<div class="table_tr">
  <div class="table_th require">
    <label for="your-birthday2" class="form_table_label">
      生年月日
    </label>
  </div>
  <div class="table_td">
    [text* your-birthday2 id:your-birthday2 class:form_calendar]
  </div>
</div>
<!-- .table_tr ここまで -->
```
