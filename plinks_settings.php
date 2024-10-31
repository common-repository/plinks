<div class="wrap">
<div class="icon32" id="icon-options-general"></div>
<h2><?php _e('pLinks Settings', 'plinks') ?></h2>
<form method="post" action="options.php">
<?php
settings_fields( 'plinks-settings' );
?>
<div id="poststuff">
<div class="postbox">
<h3><?php _e('Thumbnail Settings', 'plinks') ?></h3>
	<div class="inside">
    <table class="form-table">
        <tr valign="top">
        	<th scope="row"><?php _e('Show Preview Images', 'plinks') ?></th>
        	<td><input type="checkbox" name="websnapr-show" id="websnapr-show" value="1" <?php checked(get_option('websnapr-show'), 1); ?> /></td>
        </tr>

        <tr valign="top">
			<th scope="row"><?php _e('Thumbnail Image Size', 'plinks') ?></th>
			<td>
				<select name="websnapr-size">
					<option value="t" <?php if (get_option('websnapr-size')=='t') print('selected'); ?>><?php _e('tiny', 'plinks') ?> - 90x68px</option>
					<option value="s" <?php if (get_option('websnapr-size')=='s') print('selected'); ?>><?php _e('small', 'plinks') ?> - 120x90px</option>
					<option value="m" <?php if (get_option('websnapr-size')=='m') print('selected'); ?>><?php _e('medium', 'plinks') ?> - 200x150px</option>
					<option value="l" <?php if (get_option('websnapr-size')=='l') print('selected'); ?>><?php _e('large', 'plinks') ?> - 400x300px</option>
					<option value="x" <?php if (get_option('websnapr-size')=='x') print('selected'); ?>><?php _e('extra large', 'plinks') ?> - 480x380px</option>
				</select>
				<br /><br />
				<?php _e('For Thumbnails to work you have to register a free account and add your domain at <a href="http://pagepeeker.com/signup/free/" target="_blank">pagepeeker.com</a>','plinks') ?>
			</td>
        </tr>

		<tr valign="top">
        	<th scope="row"><?php _e('PagePeeker API Key', 'plinks') ?></th>
        	<td>
        		<input type="text" size="50" name="ppapikey" value="<?php echo get_option('ppapikey'); ?>" />
				<br /><br />
				<?php _e('If you have an API Key we swith to the registered API','plinks') ?>
        	</td>
        </tr>

        <tr valign="top">
			<th scope="row"><?php _e('Show some Love', 'plinks') ?></th>
			<td><input type="checkbox" name="plinks-showlove" id="plinks-showlove" value="1" <?php checked(get_option('plinks-showlove','1'), 1); ?> />
			<?php _e('Show this text below the link lists:','plinks') ?><br />
			<?php echo('<p style="text-align: center; font-size:11px;">'.PL_LOVE.'</p>'); ?>
			</td>
        </tr>

    </table>
    </div>
</div>
</div>
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</form>
<br />

<div id="poststuff">
<div class="postbox">
<h3><?php _e('pLinks Usage', 'plinks') ?></h3>
	<div class="inside">
	<?php _e('Simple use a shortcode on a page of your choice or create a new page and insert the following shortcode: <code>[plinks category_name="Blogroll"]</code>. Use a category that exists!', 'plinks') ?>
	<br /><br />
	<?php _e('To display a simple PagePeeker preview: <code>[pagepeeker url=http://www.powie.de]</code>','plinks') ?>
	<br /><br />
	<?php _e('To change the size of the preview image use the <b>size</b> parameter: <code>[pagepeeker url=http://www.powie.de size=l]</code>','plinks') ?>
	<br />
	<?php _e('Size is defined by PagePeeker: <code>t</code>, <code>s</code>, <code>m</code>, <code>l</code>, <code>x</code>','plinks') ?>
	<br />
	<?php _e('If no size is defined it uses the settings above!','plinks') ?>
	<br /><br />
	<?php _e('Happy Linking.', 'plinks') ?>
    </div>
</div>

<div class="postbox">
<h3><?php _e('Link Manager', 'plinks') ?></h3>
	<div class="inside">
	<?php _e('With Wordpress 3.5 and above the Link Manager ist disabled by default. Install this plugin to reactivate it: <a href="http://wordpress.org/plugins/link-manager/" target="_blank">Link Manager</a>', 'plinks') ?>
    </div>
</div>

<div class="postbox">
<h3><?php _e('About', 'plinks') ?></h3>
	<div class="inside" style="overflow:auto">
		<div style="float:left;margin-right: 10px; display:inline;">
		<!-- www -->
		WWW: <a href="https://powie.de">powie.de</a>
		</div>
		<div style="float:left;margin-right: 10px; display:inline;">
		<!-- twitter -->
		<a href="https://twitter.com/PowieT" class="twitter-follow-button" data-show-count="false" data-lang="de">@PowieT folgen</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
		<div style="float:left;margin-right: 10px; display:inline;">
		<!-- fb -->
		<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpowiede&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:350px; height:35px;" allowTransparency="true"></iframe>
		</div>
		<div style="float:left;margin-right: 10px; display:inline;">
		<!-- PagePeeker -->
		<a href="http://www.pagepeeker.com">PagePeeker</a> Website Preview Images
		</div>
    </div>
</div>

</div>

</div>