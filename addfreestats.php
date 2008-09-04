<?php

/*
Plugin Name: AddFreeStats
Plugin URI: http://www.addfreestats.com/
Description: AddfreeStats.com provides to Webmasters, free website statistics on their web site visitors. Insert AddFreeStats HTML code into your blog with this plugin.
Version: 1.0
Author: AddFreeStats
Author URI: http://www.addfreestats.com/
*/

  class AddFreeStats_Plugin {

         var $version = "1.1";

        function admin_menu() {
                add_submenu_page('options-general.php', __('AddFreeStats Plugin'), __('AFSWP'), 5, __FILE__, array($this,
'plugin_menu'));
        }

        function wp_footer() {
               echo stripcslashes(get_option('afs_code'));
                 }

        function plugin_menu() {
                $message = null;
                $message_updated = __("AFS Code inserted.");

                // update options


                if ($_POST['afs_account'])
                {
                update_option('afs_account', $_POST['afs_account']);
                if ($_POST['afs_x']) update_option('afs_x', $_POST['afs_x']);
                 else update_option('afs_x', 0);
                if ($_POST['afs_y']) update_option('afs_y', $_POST['afs_y']);
                else update_option('afs_y', 0);
                //
                $afs_x=stripcslashes(get_option('afs_x'));
                $afs_y=stripcslashes(get_option('afs_y'));
                $afs_account=stripcslashes(get_option('afs_account'));

                $afs_server="";
                if ($afs_account>99999)  $afs_server='1';
                if ($afs_account>199999) $afs_server='2';
                if ($afs_account>299999) $afs_server='3';
                if ($afs_account>399999) $afs_server='4';
                if ($afs_account>499999) $afs_server='5';
                if ($afs_account>599999) $afs_server='6';
                if ($afs_account>699999) $afs_server='7';
                if ($afs_account>799999) $afs_server='8';
                if ($afs_account>899999) $afs_server='9';

                 $afs_code="<!-- ADDFREESTATS.COM AUTOCODE V4.0 -->\n";
                if ($afs_x!=0 || $afs_y !=0) //58
                {
                $afs_code .="<DIV ID=\"addfreestats\" STYLE=\"position:relative;bottom:";
                $afs_code .="$afs_y";
                $afs_code .="px;right:";
                $afs_code .="$afs_x";
                $afs_code .="px;\">\n";
                }
                $afs_code .="<script type=\"text/javascript\">\n";
                $afs_code .="<!--\n";
                $afs_code .="var AFS_Account=\"$afs_account\";\n";
                $afs_code .="var AFS_Tracker=\"auto\";\n";
                $afs_code .="var AFS_Server=\"www";
                $afs_code .="$afs_server\";\n"; //68
                $afs_code .="var AFS_Page=\"DetectName\";\n";
                $afs_code .="var AFS_Url=\"DetectUrl\";\n";
                $afs_code .="// -->\n";
                $afs_code .="</script>\n";
                $afs_code .="<script type=\"text/javascript\" src=\"http://www";
                $afs_code .="$afs_server.addfreestats.com/cgi-bin/afstrack.cgi?usr=$afs_account\">\n";
                $afs_code .="</script>\n";
                $afs_code .="<noscript>\n";
                $afs_code .="<a href=\"http://www.addfreestats.com\">\n";
                $afs_code .="<img src=\"http://www$afs_server.addfreestats.com/cgi-bin/connect.cgi?usr=";
                $afs_code .="$afs_account";
                $afs_code .="Pauto\" border=0 alt=\"Free Web Stats\">Web Stats</a>\n";
                $afs_code .="</noscript>\n";
                if ($afs_x!=0 || $afs_y !=0) $afs_code .="</div>\n";
                $afs_code .="<!-- ENDADDFREESTATS.COM AUTOCODE V4.0  -->\n";//82
                $message = $message_updated;
                update_option('afs_code', $afs_code);
                wp_cache_flush();
                }

?>
<?php if ($message) : ?>
<div id="message" class="updated fade"><p><?php echo $message; ?></p></div>
<?php endif; ?>
<div id="dropmessage" class="updated" style="display:none;"></div>
<div class="wrap">
<h2><?php _e('AddFreeStats Options'); ?></h2>
<p><?php _e('<a title="AddFreeStats WordPress" href="http://www.addfreestats.com/">AddFreeStats WordPress
Help</a>') ?></p>
<p><?php _e('Code appear in your footer') ?></p>


<form name="dofollow" action="" method="post">
<table>
<tr>

<th scope="row" style="text-align:right; vertical-align:top;"><?php _e('AFS Account:')?></td>
<td><input type="text" size="20" name="afs_account"  value="<?php echo stripcslashes(get_option('afs_account')); ?>"</td></tr>
<tr>

<th scope="row" style="text-align:right; vertical-align:top;"><?php _e('Right Position:')?></td>
<td><input type="text" size="20" name="afs_x"  value="<?php echo stripcslashes(get_option('afs_x')); ?>"</td></tr>
<tr>

<th scope="row" style="text-align:right; vertical-align:top;"><?php _e('Bottom Position:')?></td>
<td><input type="text" size="20" name="afs_y"  value="<?php echo stripcslashes(get_option('afs_y')); ?>"</td></tr>
<tr>
<th scope="row" style="text-align:right; vertical-align:top;"><?php _e('Code:')?></td>
<td>
<textarea cols="60" rows="10" name="afs_code"><?php echo stripcslashes(get_option('afs_code')); ?></textarea></td></tr>
</table>
<p class="submit">
<input type="hidden" name="action" value="update" />
<input type="submit" name="Submit" value="<?php _e('Update Options')?> &raquo;" />
</p>
</form>
</div>
<?php

        } // plugin_menu

} // Another_WordPress_Tracker_Plugin

$_awtp_plugin = new AddFreeStats_Plugin();

add_option("afs_account", null, __('AddFreeStats Plugin'), 'yes');
add_option("afs_x", null, __('AddFreeStats Plugin'), 'yes');
add_option("afs_y", null, __('AddFreeStats Plugin'), 'yes');
add_option("afs_code", null, __('AddFreeStats Plugin'), 'yes');
add_action('admin_menu', array($_awtp_plugin, 'admin_menu'));
add_action('wp_footer', array($_awtp_plugin, 'wp_footer'));

?>
