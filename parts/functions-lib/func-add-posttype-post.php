<?php

function Change_menulabel()
{
  global $menu, $submenu;
  $name = 'お知らせ';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0]  = $name . '一覧';
  $submenu['edit.php'][10][0] = '新しい' . $name;
}

function Change_objectlabel()
{
  global $wp_post_types;
  $name = 'お知らせ';
  $labels = &$wp_post_types['post']->labels;

  $labels->name               = $name;
  $labels->singular_name      = $name;
  $labels->add_new            = '新規追加';
  $labels->add_new_item       = $name . 'の新規追加';
  $labels->edit_item          = $name . 'の編集';
  $labels->new_item           = '新規' . $name;
  $labels->view_item          = $name . 'を表示';
  $labels->search_items       = $name . 'を検索';
  $labels->not_found          = $name . 'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}

// 投稿タイプラベル変更
add_action('init', 'Change_objectlabel');

// 左メニューのカテゴリー・タグパネルを非表示
add_action('admin_menu', function () {
  remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
  remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
}, 999);

// 編集画面のカテゴリー・タグパネルを非表示
add_action('add_meta_boxes', function () {
  remove_meta_box('categorydiv', 'post', 'side');
  remove_meta_box('tagsdiv-post_tag', 'post', 'side');
}, 99);

// ブロックエディタのカテゴリー・タグパネルを非表示
add_action('enqueue_block_editor_assets', function () {
  $screen = function_exists('get_current_screen') ? get_current_screen() : null;
  if (!$screen || $screen->post_type !== 'post') return;

  wp_add_inline_script(
    'wp-edit-post',
    "wp.data.dispatch('core/edit-post').removeEditorPanel('taxonomy-panel-category');
     wp.data.dispatch('core/edit-post').removeEditorPanel('taxonomy-panel-post_tag');"
  );
});

// 左メニューのラベル変更
add_action('admin_menu', 'Change_menulabel');
