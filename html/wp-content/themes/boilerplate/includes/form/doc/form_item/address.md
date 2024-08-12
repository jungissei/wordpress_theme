## 必要プラグイン
```php:includes/form/form.php
function form_enqueue_scripts() {

  add_action( 'wp_enqueue_scripts', function () {

    // ・・・省略・・・

    // yubinbango
    wp_enqueue_script( 'yubinbango', get_theme_file_uri( '/includes/form/lib/js/yubinbango/yubinbango.js' ), ['jquery'], $form_assets_version);

    // ・・・省略・・・
  });
}
```


## HTML
```html
    <!-- BEGIN .table_tr -->
    <div class="table_tr">
      <fieldset class="table_fieldset">
        <legend class="table_th require">
          住所
        </legend>
        <div class="table_td">
          <div class="form_address_group h-adr">

            <input
              type="hidden"
              class="p-country-name"
              value="Japan"
            >

            <!-- BEGIN 郵便番号 -->
            <div class="group_postal_code">
              <label class="postal_code_label" for="your-postal-code1">
                郵便番号
              </label>
              <div class="postal_code_input_row">
                <div class="postal_code_input_col">
                  [text your-postal-code1 maxlength:7 id:your-postal-code1 class:p-postal-code placeholder "1234567"]
                </div>
                <div class="postal_code_button_col">
                  <button type="button" class="postal_code_button form_common_button1 postal-search">
                    住所検索
                  </button>
                </div>
              </div>
            </div>
            <!-- END 郵便番号 -->

            <!-- BEGIN 住所 -->
            <div class="group_address">
              [text* your-address1 id:your-address1 class:p-region class:p-locality class:p-street-address class:p-extended-address placeholder "東京都新宿区西新宿2-8-1"]
            </div>
            <!-- END 住所 -->

          </div>


        </div>
      </fieldset>
    </div>
    <!-- END .table_tr -->
```
