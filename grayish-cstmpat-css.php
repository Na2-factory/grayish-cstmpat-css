<?php
/*
Plugin Name: grayish-cstmpat-css
Description: grayishの1カラム用サンプルパターン向けCSSを追加するプラグイン
Version: 1.1.1
Author: Na2factory
Author URI: https://na2-factory.com/
License: GNU General Public License
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) exit;

// 現在のテーマがcocoon-master or cocoon-masterの子テーマである場合のみ処理を行う
$theme = wp_get_theme();
if (!$theme || ('cocoon-master' !== $theme->template && (!$theme->parent() || 'cocoon-master' !== $theme->parent()->template))) {
	return;
}


if (!defined('GRY_CSTMPAT_PLUGIN_VERSION')) {
	define('GRY_CSTMPAT_PLUGIN_VERSION', '1.1.1');
}

if (!defined('GRY_CSTMPAT_PLUGIN_PATH')) {
	define('GRY_CSTMPAT_PLUGIN_PATH', plugin_dir_path(__FILE__));
}
if (!defined('GRY_CSTMPAT_PLUGIN_URL')) {
	define('GRY_CSTMPAT_PLUGIN_URL', plugins_url('/', __FILE__));
}

add_action('wp_enqueue_scripts', function () {

	/** CSS */
	wp_enqueue_style(
		'grayish-cstmpat-css-style',
		GRY_CSTMPAT_PLUGIN_URL . 'assets/grayish-cstmpat-css.css',
		array(),
		GRY_CSTMPAT_PLUGIN_VERSION
	);
});

add_action('enqueue_block_editor_assets', function () {
	// エディター用のCSSを登録
	wp_enqueue_style(
		'grayish-cstmpat-css-editor-style',
		GRY_CSTMPAT_PLUGIN_URL . 'assets/grayish-cstmpat-css.css',
		array(),
		GRY_CSTMPAT_PLUGIN_VERSION
	);
});
