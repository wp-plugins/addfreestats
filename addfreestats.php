<?php

/*
Plugin Name: AddFreeStats
Plugin URI: http://www.addfreestats.com/
Description: AddFreeStats offers one of the best real-time website analytics tool using the latest technologies. Easy to use! Easy to install
Version: 3.0
Author: AddFreeStats
Author URI: http://www.addfreestats.com/
*/

  class AddFreeStats_Plugin {

         var $version = "3.0";

        function admin_menu() {
                add_submenu_page('options-general.php', __('AddFreeStats Plugin'), __('AFSWP'), 'manage_options', __FILE__, array($this,'plugin_menu'));
        }

        function wp_footer() {
               echo stripcslashes(get_option('afs_code'));
                 }

        function plugin_menu() {
                $message = null;
                $message_updated = __("AddFreeStats Code inserted.");

                // update options

              if (!empty($_POST))
              {
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
                if ($afs_account>999999) $afs_server='10';

                $afs_code="<!-- ADDFREESTATS.COM AUTOCODE V5 -->\n";
                $afs_code .="<!-- Asynchronous tracking code  -->\n";
                $afs_code .="<!-- Speed Up 10x load time -->\n";
                $afs_code .="<!-- AUTODETECT PAGE NAME & URL -->\n";
                
                if ($afs_x!=0 || $afs_y !=0) //58
                {
                $afs_code .="<div id=\"addfreestats-wordpress\" STYLE=\"position:relative;bottom:";
                $afs_code .="$afs_y";
                
                   if ($afs_x!=0)
                   {
                   $afs_code .="px;right:";
                   $afs_code .="$afs_x";
                   $afs_code .="px;\">\n";
                   }
                   else 
                   {
                   $afs_code .="px;\" align=\"center\">\n";   
                   }
                             
                }
                else $afs_code .="<div id=\"addfreestats-wordpress\" align=\"center\" STYLE=\"position:relative;bottom: 2px;\">\n";
                
              
                               
               //$afs_code .="<div id='addfreestats'></div>\n";
               $afs_code .="<script type=\"text/javascript\"><!--\n";
               $afs_code .="afsid =document.getElementById(\"addfreestats\");\n";
               $afs_code .="if (afsid==null) { \n";
               $afs_code .="var afsdiv = document.createElement(\"div\");\n";
               $afs_code .="afsdiv.id=\"addfreestats\";\n";
               $afs_code .="var content='<div id=\"addfreestats\"></div>';\n";
               $afs_code .="document.getElementById('addfreestats-wordpress').innerHTML = content;\n";
               $afs_code .="}\n";

                
                
               $afs_code .="var AFS_Account=\"$afs_account\";\n";
               $afs_code .="var AFS_Tracker=\"auto\";\n";
               $afs_code .="var AFS_Server=\"www";
               $afs_code .="$afs_server\";\n"; //68
               $afs_code .="var AFS_Page=\"DetectName\";\n";
               $afs_code .="var AFS_Url=\"DetectUrl\";\n";
               $afs_code .="var speed = document.createElement('script');\n";
               $afs_code .="speed.type = 'text/javascript';\n";
               $afs_code .="speed.async = true;\n";
               $afs_code .="speed.src ='http://'+AFS_Server+'.addfreestats.com/cgi-bin/afstracka.cgi?usr='+AFS_Account;\n";
               $afs_code .="var s = document.getElementsByTagName('script')[0];\n";
               $afs_code .="s.parentNode.insertBefore(speed, s);\n";
               $afs_code .="//--></script>\n";
               $afs_code .="<noscript>\n";
               $afs_code .="<a href=\"http://www.addfreestats.com\" >\n";
               $afs_code .="<img src=\"http://www$afs_server.addfreestats.com/cgi-bin/connect.cgi?usr=";
               $afs_code .="$afs_account";
               $afs_code .="Pauto\" border=0 alt=\"AddFreeStats\">Website Statistics</a>\n";
               $afs_code .="</noscript>\n";
               $afs_code .="</div>\n";
               $afs_code .="<!-- ENDADDFREESTATS.COM AUTOCODE V5.0  -->\n";//82
                $message = $message_updated;
                update_option('afs_code', $afs_code);
                wp_cache_flush();
                }
              }
?>

<?php if ($message) : ?>
<div id="message" class="updated fade"><p><?php echo $message; ?></p></div>
<?php endif; ?>
<div id="dropmessage" class="updated" style="display:none;"></div>
       <script type="text/javascript">
           
        function register()
        {
<?php
        $sitename = get_bloginfo('name');
        $siteurl = get_bloginfo('url');
        $sitedes = get_bloginfo('description');
        print "var sitename='$sitename';\n";
        print "var siteurl='$siteurl';\n";
        print "var sitedes= '$sitedes';\n";
        print "var gourl='http://www.addfreestats.com/wpsignup.php?';\n";
        print "gourl+='&sitename='+encodeURIComponent(sitename);\n";
        print "gourl+='&siteurl='+encodeURIComponent(siteurl);\n";
        print "gourl+='&sitedes='+encodeURIComponent(sitedes);\n";
?>
        window.open(gourl,"AddFreeStats Sign Up","width=450, height=500,toolbar=no, scrollbars=no, resizable=no, top=10,left=10");
        } 
        </script>

        <div class="wrap" style="width:400px; border: 1px solid #ddd;margin: 10px auto;padding: 15px">
            <div style="text-align:center">
<?php
$plugdir=plugins_url();
print "<img src='$plugdir/addfreestats/logo.png'></a>\n";
?>
           <br>
                <h3>How to install AddFreeStats?</h3>
            </div>
            <div style="text-align:left; padding-left:20px">
                1 - New Website? -> <a href="javascript:register()">Click here</a> to get a Website ID.<br>
                2 - Type your Website ID into the Website ID field.<br>
                3 - Click on 'Update Options' button.<br>
                4 - AddFreeStats code will be inserted into the footer. 
                <br><br>
                If you want to display it in other place, just paste the line: <I>
                &ltdiv id="addfreestats"&gt&lt/div&gt </I> 
                where you want the button to appear into your html page.

                
            </div>
<?php
        $account = get_option('afs_account');
        if (!empty($account)) {
            print "<div style='text-align:center'>";
            print "<br><a href='http://new.addfreestats.com/?usr=$account' target='_blank'>View your website stats</a>";
            print "</div>";
        }
?>
          <div style="text-align:center">
                <h3>Plugin Options</h3>
            </div>
            <div style="text-align:center; padding-left:20px">
                <form name="dofollow" action="" method="post">
                    <table>
                        <tr>
                            <td scope="row" style="text-align:left; vertical-align:middle;"><?php _e('Website ID:') ?></td>
                            <td><input type="text" size="20" placeholder="8 digits" name="afs_account"  value="<?php echo stripcslashes(get_option('afs_account')); ?>"</td></tr>
                        <tr>
                            <td scope="row" style="text-align:left; vertical-align:middle;"><?php _e('Right Position:') ?></td>
                            <td><input type="text" size="20" name="afs_x"  value="<?php echo stripcslashes(get_option('afs_x')); ?>"</td></tr>
                        <tr>
                            <td scope="row" style="text-align:left; vertical-align:middle;"><?php _e('Bottom Position:&nbsp;') ?></td>
                            <td><input type="text" size="20" name="afs_y"  value="<?php echo stripcslashes(get_option('afs_y')); ?>"</td></tr>
                    </table>
                    <div class="submit" style="text-align:center">
                        <input type="hidden" name="action" value="update" />
                        <input type="submit" name="Submit" style="cursor:pointer" value="<?php _e('Update Options') ?> &raquo;" />
                    </div>
                </form>
                <p><a title="AddFreeStats WordPress Analytics" href="http://www.addfreestats.com" target="_blank">AddFreeStats WordPress Plugin</a></p>
            </div>
        </div>
<?php
    
       } // plugin_menu

} // Another_WordPress_Tracker_Plugin

$_awtp_plugin = new AddFreeStats_Plugin();

add_option("afs_account", null,'', 'yes');
add_option("afs_x", null,'', 'yes');
add_option("afs_y", null,'', 'yes');
add_option("afs_code",null,'','yes');
add_action('admin_menu', array($_awtp_plugin, 'admin_menu'));
add_action('wp_footer', array($_awtp_plugin, 'wp_footer'));

?>
