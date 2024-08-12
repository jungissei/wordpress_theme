## 必要プラグイン
```php:includes/form/form.php
function form_enqueue_scripts() {

  add_action( 'wp_enqueue_scripts', function () {

    // ・・・省略・・・



    // ・・・省略・・・
  });
}
```


## HTML
```html

  <div class="form_table">
    <!-- ・・・省略・・・ -->
  </div>

  <div class="form_privacy">
    <div class="form_privacy_row1">
      <h2 class="common_ttl1 privacy_ttl">
        <span class="ttl_inner">
          プライバシーポリシーについて
        </span>
      </h2>
    </div>

    <div class="form_privacy_row2">
      <div class="privacy_txt simplebar-scrollable-y" data-simplebar="init" data-simplebar-auto-hide="false"><div class="simplebar-wrapper" style="margin: -30px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 30px;">
        <p>
          ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。
        </p>
        <p>
          ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。
        </p>
        <p>
          ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。
        </p>
        <p>
          ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。ここに文章が入ります。
        </p>
      </div></div></div></div><div class="simplebar-placeholder" style="width: 998px; height: 234px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar simplebar-visible" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar simplebar-visible" style="height: 167px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
    </div>

    <div class="form_privacy_row3">
      <ul class="privacy_check form_check form_item_block_pc form_item_block_sp">
        <li>
          [checkbox* privacy_checkbox id:privacy_checkbox use_label_element "プライバシーポリシーに同意する"]
        </li>
      </ul>
    </div>
  </div>
  <!-- Submit Button Start -->
  [submit "送信"]
  <!-- Submit Button End -->
```
