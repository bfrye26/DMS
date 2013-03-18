<?php 



class EditorCode{
	
	function __construct(){
		
		add_filter('pl_toolbar_config', array(&$this, 'toolbar'));
		add_action('pagelines_editor_scripts', array(&$this, 'scripts'));
	
		$this->url = PL_PARENT_URL . '/editor';
	}
	
	function scripts(){
		
		// CodeMirror Syntax Highlighting
		wp_enqueue_script( 'codemirror', PL_ADMIN_JS . '/codemirror/codemirror.js', array( 'jquery' ), PL_CORE_VERSION );
		wp_enqueue_script( 'codemirror-css', PL_ADMIN_JS . '/codemirror/css/css.js', array( 'jquery' ), PL_CORE_VERSION );
		wp_enqueue_script( 'codemirror-less', PL_ADMIN_JS . '/codemirror/less/less.js', array( 'jquery' ), PL_CORE_VERSION );
		wp_enqueue_script( 'codemirror-js', PL_ADMIN_JS . '/codemirror/javascript/javascript.js', array( 'jquery' ), PL_CORE_VERSION );
		wp_enqueue_script( 'codemirror-xml', PL_ADMIN_JS . '/codemirror/xml/xml.js', array( 'jquery' ), PL_CORE_VERSION );
		wp_enqueue_script( 'codemirror-html', PL_ADMIN_JS . '/codemirror/htmlmixed/htmlmixed.js', array( 'jquery' ), PL_CORE_VERSION );
		
		// PageLines Specific JS @Code Stuff
		wp_enqueue_script( 'pl-js-code', $this->url . '/js/pl.code.js', array( 'jquery', 'codemirror' ), PL_CORE_VERSION );
	}
	
	function toolbar( $toolbar ){
		$toolbar['pl-design'] = array(
				'name'	=> 'Custom',
				'icon'	=> 'icon-magic',
				'form'	=> true,
				'pos'	=> 50,
				'panel'	=> array(
					'heading'	=> "Site Design",

					'user_less'	=> array(
						'name'	=> 'Custom LESS/CSS',
						'call'	=> array(&$this, 'custom_less'),
						'icon'	=> 'icon-circle'
					),
					'user_scripts'	=> array(
						'name'	=> 'Custom Scripts',
						'call'	=> array(&$this, 'custom_scripts'),
						'flag'	=> 'custom-scripts',
						'icon'	=> 'icon-circle-blank'
					),
				)
			);
		
		return $toolbar;
	}
	
	
	function custom_less(){
		?>
		<div class="opt codetext">
			<div class="opt-name">
				Custom LESS/CSS
			</div>
			<div class="opt-box">
				<div class="codetext-meta fix">
					<label class="codetext-label">Custom LESS/CSS</label>
					<span class="codetext-help help-block"><span class="label label-info">Tip</span> Hit [Cmd&#8984;+Return ] or [Ctrl+Return] to Preview Live</span>
				</div>
				<form class="code-form"><textarea class="custom-less" name="custom_less[0]"> </textarea></form>
			</div>
		</div>

		<?php
	}

	function custom_scripts(){
		?>
		<div class="opt codetext">
			<div class="opt-name">
				Custom Scripts
			</div>
			<div class="opt-box">
				<div class="codetext-meta fix">
					<label class="codetext-label">Custom Javascript or Header HTML</label>
				</div>
				<form class="code-form"><textarea class="custom-scripts" name="custom_scripts[0]"> </textarea></form>
			</div>
		</div>

		<?php
	}
	
	
}