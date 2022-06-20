<?php
	namespace sv100;

	class sv_block_spacer extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Spacer', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				->set_block_handle('wp-block-spacer')
				->set_css_cache_active();
		}
		
		protected function load_settings(): sv_block_spacer {

			return $this;
		}
		public function enqueue_scripts(): sv_block_spacer {
			if(!$this->has_block_frontend('spacer')){
				return $this;
			}

			if(!is_admin()){
				$this->load_settings()->register_scripts();
			}

			foreach($this->get_scripts() as $script){
				$script->set_is_enqueued();
			}
			
			return $this;
		}
	}