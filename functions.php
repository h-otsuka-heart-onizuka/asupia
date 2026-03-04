<?php
/**
 * Lightning Child theme functions
 *
 * @package lightning
 */

/************************************************
 * 独自CSSファイルの読み込み処理
 *
 * 主に CSS を SASS で 書きたい人用です。 素の CSS を直接書くなら style.css に記載してかまいません.
 */

// 独自のCSSファイル（assets/css/）を読み込む場合は true に変更してください.
$my_lightning_additional_css = false;

if ( $my_lightning_additional_css ) {
	// 公開画面側のCSSの読み込み.
	add_action(
		'wp_enqueue_scripts',
		function() {
			wp_enqueue_style(
				'my-lightning-custom',
				get_stylesheet_directory_uri() . '/assets/css/style.css',
				array( 'lightning-design-style' ),
				filemtime( dirname( __FILE__ ) . '/assets/css/style.css' )
			);
		}
	);
	// 編集画面側のCSSの読み込み.
	add_action(
		'enqueue_block_editor_assets',
		function() {
			wp_enqueue_style(
				'my-lightning-editor-custom',
				get_stylesheet_directory_uri() . '/assets/css/editor.css',
				array( 'wp-edit-blocks', 'lightning-gutenberg-editor' ),
				filemtime( dirname( __FILE__ ) . '/assets/css/editor.css' )
			);
		}
	);
}


/************************************************
 * 独自の処理を必要に応じて書き足します
 */

// ロゴの横に電話番号とボタンを表示
function my_lightning_header_logo_after() {
	echo <<<EOM
		<div class="logo-after">
			<form name="form1" method="post" action="https://www.oita-yoyaku.jp/studio/member/VisitorLogin.php" target="_blank" rel="noopener noreferrer"> <input type="hidden" name="lc" value="qnxqqnsqrs"> <input type="hidden" name="mn" value="6"> <input type="hidden" name="gr" value="17"> <input type="hidden" name="stt" value="MLRRX"> <input type= "submit" name="button" value="施設予約はこちら" style="width:100%;height:45px"></form>
		</div>
	EOM;
}
add_action('lightning_header_logo_after', 'my_lightning_header_logo_after');

/**
 * 重要なお知らせの判定と表示
 */
