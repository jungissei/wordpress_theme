jQuery(function($){

// ----------------------------------------------------------------------------
// 【Table Of Content】
//
// 必須 or 任意のラベル追加
// Input File
// Select
// Address (yubinbango)
// Input Date (flatpickr)
// Privacy policy
// ----------------------------------------------------------------------------


// --------------------------------------
// 必須 or 任意のラベル追加
// --------------------------------------
$('.wpcf7-form .table_th').each(function () {

  let $th = $(this);

  $th.append(
    '<span class="form_label">' +
    ($th.hasClass('require') ? '必須' : '任意') +
    '</span>'
  );
});


// --------------------------------------
// Input File
// --------------------------------------
$(function () {
  let $input_items = $('[data-form-file="wrapper"] input[type="file"]');

  if ($input_items.length > 0) {

    initialize_file_inputs($input_items);
    add_file_input_event_to_button();
  }
});

/**
 * ファイル入力フィールドの初期化と変更イベントの処理を行う
 * @param {jQuery} $input_items ファイル入力フィールドの jQuery オブジェクト
 */
function initialize_file_inputs($input_items) {
  $input_items.each(function() {
    const $input = $(this);
    const $wrapper = $input.closest('[data-form-file="wrapper"]');
    const $file_text = $wrapper.find('[data-form-file-text-default]');

    $file_text.attr('data-form-file-text-default', $file_text.text());
    const default_text = $file_text.attr('data-form-file-text-default');

    // 初期状態の設定
    set_file_text_state($file_text, default_text, true);

    $input.on('change', function() {
      const file_name = $input.val() ? get_file_name($input.val()) : default_text;
      set_file_text_state($file_text, file_name, !$input.val());
    });
  });
}

/**
 * ファイルテキスト要素の状態を設定する
 * @param {jQuery} $file_text ファイルテキスト要素の jQuery オブジェクト
 * @param {string} text 表示するテキスト
 * @param {boolean} is_no_value 値がない状態かどうか
 */
function set_file_text_state($file_text, text, is_no_value) {
  $file_text.text(text);
  $file_text.toggleClass('no_value', is_no_value);
}

/**
 * ファイルパスからファイル名を取得する
 * @param {string} file_path ファイルパス
 * @return {string} ファイル名
 */
function get_file_name(file_path) {
  return file_path.split('\\').pop();
}


/**
 * ファイル入力ボタンにクリックイベントとキーボードイベントを追加。
 */
function add_file_input_event_to_button() {
  const $file_buttons = $('button[data-form-file-for]');

  // クリックイベントの追加
  $file_buttons.on('click', trigger_file_input);

  // キーボードイベントの追加
  $file_buttons.on('keydown', function(event) {
    // スペースキー(32)またはエンターキー(13)が押された場合
    if (event.keyCode === 32 || event.keyCode === 13) {
      event.preventDefault();
      trigger_file_input.call(this);
    }
  });
}

/**
 * 関連するファイル入力フィールドをトリガー。
 */
function trigger_file_input() {
  const $button = $(this);
  const input_id = $button.attr('data-form-file-for');
  const $input = $('#' + input_id);

  if ($input.length) {
    $input.trigger('click');
  }
}



// --------------------------------------
// Select
// --------------------------------------

/**
 * セレクトボックスの初期化と動作設定を行う
 */
$(function () {
  const $select = $('.wpcf7-select');

  // 初期状態のテキストカラーを制御
  control_select_text_color($select);

  // フォーカス時の処理
  $select.on('focus', function () {
    $(this).removeClass('no_value');
  });

  // ブラーまたは値変更時の処理
  $select.on('blur change', function () {
    control_select_text_color($(this));
  });
});

/**
 * セレクトボックスのテキストカラーを制御する
 * @param {jQuery} $select セレクトボックスのjQueryオブジェクト
 */
function control_select_text_color($select) {
  // 値が空の場合、no_valueクラスを追加
  if ($select.val() === '') {
    $select.addClass('no_value');
  } else {
    // 値がある場合、no_valueクラスを削除
    $select.removeClass('no_value');
  }
}



// --------------------------------------
// Address (yubinbango)
// --------------------------------------
/**
 * 郵便番号から住所を自動入力する機能を初期化する
 */
(function () {
  const h_adr_all = document.querySelectorAll('.h-adr');
  if (h_adr_all.length === 0) return;

  h_adr_all.forEach(function (h_adr) {
    initialize_address_auto_fill(h_adr);
  });
})();

/**
 * 郵便番号から住所を自動入力する機能を設定する
 * @param {HTMLElement} h_adr 住所入力フォームを含む要素
 */
function initialize_address_auto_fill(h_adr) {
  let is_auto_fill_enabled = true;
  const postal_code_fields = h_adr.querySelectorAll('.p-postal-code');
  const postal_field = postal_code_fields[postal_code_fields.length - 1];

  /**
   * キーアップイベントをキャンセルする関数
   * @param {Event} e キーアップイベント
   */
  const cancel_keyup_event = function (e) {
    if (is_auto_fill_enabled) {
      e.stopImmediatePropagation();
    }
    return false;
  };

  // 通常の挙動をキャンセルできるようにイベントを追加
  postal_field.addEventListener('keyup', cancel_keyup_event, false);

  // 住所検索ボタンクリック時の処理
  $('.postal-search').on('click', function () {
    // 自動入力を一時的に有効化
    is_auto_fill_enabled = false;

    // キーアップイベントを発火
    let event;
    if (typeof Event === 'function') {
      event = new Event('keyup');
    } else {
      event = document.createEvent('Event');
      event.initEvent('keyup', true, true);
    }
    postal_field.dispatchEvent(event);

    // 自動入力を再度無効化
    is_auto_fill_enabled = true;
  });
}

// --------------------------------------
// Input Date (flatpickr)
// --------------------------------------
$(function () {

  let $calendar = $('.form_calendar');

  if ($calendar.length > 0) {

    $calendar.flatpickr({
      dateFormat: 'Y/m/d',
      'locale': 'ja',
      disableMobile: 'true'
    });
  }
});





// --------------------------------------
// Privacy policy
// --------------------------------------
$('#privacy_checkbox').on('change', function () {
  if ($(this).prop('checked')) {
    $('#form_submit').attr('disabled', false)
    return;
  }

  $('#form_submit').attr('disabled', true)
  return;
});


});
