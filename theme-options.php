<div class="wrap">
  <div id="icon-options-general" class="icon32"><br></div>
  <h2>Theme Options</h2>
  <?php $active      = ' nav-tab-active'; ?>
  <h2 class="nav-tab-wrapper">
    <a href="?page=theme_options&tab=engage" class="nav-tab<?php echo ( anatomy_current_tab() == 'engage' ? $active : '' ); ?>"><i class="icon-fire"></i> Engage</a>
    <a href="?page=theme_options&tab=design" class="nav-tab<?php echo ( anatomy_current_tab() == 'design' ? $active : '' ); ?>"><i class="icon-heart-empty"></i>  Design</a>
    <?php if ( wpd_plugin_is_installed() ) { ?>
    <a href="?page=theme_options&tab=dictionary" class="nav-tab<?php echo ( anatomy_current_tab() == 'dictionary' ? $active : '' ); ?>"><i class="icon-book"></i>  Dictionary</a><?php } ?></h2>
  <form action="options.php" method="post" accept-charset="utf-8">
    <?php if ( function_exists( 'wpd_plugin_is_installed' ) AND wpd_plugin_is_installed() == false ) { ?>
      <style type="text/css" media="screen">
        .error.blue {
          background: #E0ECF8;
          border-color: #A9D0F5;
          color: #0B173B;
        }
        .error.blue a {
          color: #045FB4;
        }
      </style>
      <div id="message" class="error blue">
        <p>You'll get a lot more out of this theme if you <a href="http://www.annedorko.com/wp-dictionary" target="_blank">use the WordPress Dictionary Plugin</a>.</p>
      </div>
    <?php } ?>
    <?php 
    $tab_name = ucwords( anatomy_current_tab() );
    if ( isset( $_GET['settings-updated']) AND $_GET['settings-updated'] === 'true' ) { ?>
        <div id="message" class="updated below-h2 fade">
            <p>Successfully saved <strong><?php echo $tab_name; ?> Settings</strong>.</p>
        </div>
    <?php } elseif ( isset( $_GET['settings-updated'] ) AND $_GET['settings-updated'] === 'false' ) { ?>
      <div id="message" class="error below-h2 fade">
          <p>Error saving <strong><?php echo $tab_name; ?> Settings</strong>.</p>
      </div>
    <?php } ?>
    <?php $current_fields = 'anatomy_' . anatomy_current_tab(); ?>
    <?php settings_fields( $current_fields ); ?>
    <?php do_settings_sections( $current_fields ); ?>
    <?php submit_button( "Save $tab_name Settings" ); ?>
  </form>
</div>