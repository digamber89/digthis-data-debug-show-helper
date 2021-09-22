<?php
/**
 * Digthis Data Debug Helper
 *
 * @author            Digamber Pradhan
 * @copyright         2019 Your Name or Company Name
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Digthis Data Debug Helper
 * Plugin URI:        #
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Digamber Pradhan
 * Author URI:        https://www.digamberpradhan.com
 * Text Domain:       digthis-data-debug-show-helper
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        #
 */

defined( 'ABSPATH' ) || die( 'NO SCRIPT KIDDIES' );

function vczapi_test_footer() {
	?>
	<style>
        .vczapi-show-data {
            position: fixed;
            top: 50%;
            right: 0;
            z-index: 9999;
        }
	</style>
	<script>
        let dataToggle = {
            init: function () {
                this.button = document.querySelector('#vczapi-show-data-toggle');
                this.button.addEventListener('click', this.showOrHideDebugData.bind(this))
            },
            showOrHideDebugData: function (e) {
                e.preventDefault();
                const urlParams = new URLSearchParams(window.location.search);
                if (urlParams.has('cm-test')) {
                    urlParams.delete('cm-test');
                } else {
                    urlParams.set('cm-test', '1');
                }

                window.location.search = urlParams;
            }
        }

        window.addEventListener('load', function () {
            dataToggle.init();
        })


	</script>
	<div class="vczapi-show-data">
		<input
			type="button"
			id="vczapi-show-data-toggle"
			value="<?php
			echo filter_input(INPUT_GET,'cm-test')?'Hide Debug Data':'Show Debug Data'; ?>"/>
	</div>
	<?php
}
add_action( 'init', function () {
	vczapi_test_footer();
	if ( filter_input( INPUT_GET, 'cm-test' ) == '1' ) {
		//you show answer the debug data you want to see here.
		die;
	}
} );
