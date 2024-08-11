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
  $file_text.toggleClass('no-value', is_no_value);
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
 * Change text color when input file is empty
 */
$(function () {
  let select = $('.form_wrp .form_select select');

  control_select_txt_color(select);

  select.on('focus', function () {
    select.css('color', '');
  });

  select.on('blur change', function () {
    control_select_txt_color($(this));
  });
});

/**
 * @param {object} select
 */
function control_select_txt_color(select) {
  if (select.val() == '') {
    select.css('color', '#757575');
    return;
  }

  select.css('color', '');
}



// --------------------------------------
// Address (yubinbango)
// --------------------------------------
(function () {

  let h_adr_all = document.querySelectorAll('.h-adr');
  if (h_adr_all.length === 0) return;

  h_adr_all.forEach(function (h_adr) {

    add_address_by_postal_code(h_adr);
  });
})();

function add_address_by_postal_code(h_adr) {
  let cancel_flag = true,
    on_keyup_canceller = function (e) {

      if (cancel_flag) {
        e.stopImmediatePropagation();
      }

      return false;
    },
    postal_code = h_adr.querySelectorAll('.p-postal-code'),
    postalField = postal_code[postal_code.length - 1];

  //通常の挙動をキャンセルできるようにイベントを追加
  postalField.addEventListener('keyup', on_keyup_canceller, false);


  //ボタンクリック時
  $('.postal-search').on('click', function () {

    //キャンセルを解除
    cancel_flag = false;

    //発火
    let event;
    if (typeof Event === 'function') {
      event = new Event('keyup');
    } else {
      event = document.createEvent('Event');
      event.initEvent('keyup', true, true);
    }
    postalField.dispatchEvent(event);

    //キャンセルを戻す
    cancel_flag = true;
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
