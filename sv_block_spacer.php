<?php
	namespace sv100;

	class sv_block_spacer extends init {
		public function init() {
			$this->set_module_title( __( 'Block: Spacer', 'sv100' ) )
				->set_module_desc( __( 'Settings for Gutenberg Block', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(5000)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M96 496V16c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v480c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16zm128 0V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v480c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16z"/></svg>')
				->get_root()
				->add_section( $this );
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