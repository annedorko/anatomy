<?php
#===== ENGAGE FUNCTIONS =====#

function anatomy_messages_function() {
  ?>
  <style type="text/css" media="screen">
    .error.gray {
      background: #F1F1F1;
      border-color: #D5D5D5;
      color: #000;
    }
    .error.gray a {
      color: #000;
    }
  </style>
  <div id="message" class="error gray below-h2">
    <p style="font-size:1.1em;"><i class="icon-comments-alt"></i> <strong>Your readers are listening.</strong> <em>What are you saying?</em></p>
  </div>
  <?php
}

  function anatomy_message_field_function() {
    $options = anatomy_options();
    $value   = isset( $options['homepage']['message'] ) ? $options['homepage']['message'] : ''; ?>
    <?php
    echo '<input type="text" name="anatomy_options[homepage][message]" value="'.$value.'" class="homepage widefat" placeholder="Engage your users with a strong headline.">'; ?>
    <h3 class="description"><i class="icon-arrow-right"></i> Engagement Tip:</h3>
    <p class="description">New visitors should know what you and your website are all about in less than 7 seconds.<br />Make a statement and display it prominently on your home page.</p>
    <?php
  }

  function anatomy_comments_intro_function() {
    $args = array(
      'media_buttons' => false,
      'textarea_rows' => 3,
      'teeny' => true
    );
    wp_editor( anatomy_options('comments_intro'), 'anatomy_options[comments_intro]', $args );
    ?>
    <h3 class="description"><i class="icon-arrow-right"></i>  Engagement Tip:</h3>
    <p class="description">The best place to invite your readers to comment is at the end of your posts.<br />Write a special message to display about your comment form.</p>
    <?php
  }
  
#===== DESIGN FUNCTIONS =====#

function anatomy_feelings_function() {
  ?>
  <style type="text/css" media="screen">
    .error.gray {
      background: #F1F1F1;
      border-color: #D5D5D5;
      color: #000;
    }
    .error.gray a {
      color: #000;
    }
  </style>
  <div id="message" class="error gray below-h2">
    <p style="font-size:1.1em;"><i class="icon-heart"></i> <strong>Your readers are human.</strong> <em>How does your design make them feel?</em></p>
  </div>
  <?php
}

  function anatomy_emotion_function() {
    $value = anatomy_options( 'color_scheme', 'default' );
    echo '<select name="anatomy_options[color_scheme]" id="color_scheme">
      <option value="default"' . ( $value == 'default' ? ' selected' : '' ) . '>Ambitious: Orange</option>
      <option value="blue"' . ( $value == 'blue' ? ' selected' : '' ) . '>Loyal: Blue</option>
      <option value="red"' . ( $value == 'red' ? ' selected' : '' ) . '>Excited: Red</option>
      <option value="green"' . ( $value == 'green' ? ' selected' : '' ) . '>Comforted: Green</option>
    </select>
    <h3 class="description"><i class="icon-arrow-right"></i> Feelings Tip:</h3>
    <p class="description">The colors you use play a large role in the emotions you evoke from your site visitors.<br />Try to choose an emotion that works with your overall goal.</p>';
  }

  function anatomy_vibe_function() {
    $value = anatomy_options( 'font_set', 'Alegreya:400italic,700italic,400,700|Alegreya+SC:400,700' );
    $preview_url = get_template_directory_uri() . '/images/preview/vibe-';
    $fonts = array(
      'authentic' => array( 'Alegreya:400italic,700italic,400,700|Alegreya+SC:400,700', 'Authentic: Alegreya &amp; Arial' ),
      'trendy' => array( 'Open+Sans:400italic,700italic,400,700|Trocchi', 'Trendy: Trocchi &amp; Open Sans' ),
      'pristine' => array( 'Droid+Sans:400,700|Lora:400,700,400italic', 'Pristine: Lora &amp; Droid Sans' )
    ); ?>    <table border="0" cellspacing="5" cellpadding="5">
      <tr>
      <?php foreach ($fonts as $set => $font ) { 
        ?>
      <th><label><input type="radio" name="anatomy_options[font_set]" value="<?php echo $font[0]; ?>" id="<?php echo $set; ?>" <?php echo $value == $font[0] ? ' checked="checked"' : ''; ?>> <?php echo $font[1]; ?></label></th>
      <?php } ?>
      </tr>
      <tr>
      <?php foreach ($fonts as $set => $font ) { ?>
        <td class="texture_container">
          <label for="<?php echo $set; ?>">
          <div class="border">
            <img src="<?php echo $preview_url . $set; ?>.png" />
          </div>
          </label>
        </td>
      <?php } ?>
      </tr>
    </table>
    <h3 class="description"><i class="icon-arrow-right"></i> Feelings Tip:</h3>
     <p class="description">The way you say it is important, but the way you display it will create a different feeling, or in this case - a different vibe.<br />Pick the vibe you hope your readers pick up on.</p>
    <?php
  }

  function anatomy_mood_function() {
    $value = anatomy_options( 'texture_set', 'linen|brillant' );
  
    $dark_url = get_template_directory_uri() . '/images/backgrounds/dark_';
    $light_url = get_template_directory_uri() . '/images/backgrounds/light_';
    ?>
    <table border="0" cellspacing="5" cellpadding="5">
      <tr>
        <th><label><input type="radio" name="anatomy_options[texture_set]" value="sterile" id="sterile"<?php echo $value == 'sterile' ? ' checked="checked"' : '' ?>> Sterile</label></th>
        <th><label><input type="radio" name="anatomy_options[texture_set]" value="linen|brillant" id="polished"<?php echo $value == 'linen|brillant' ? ' checked="checked"' : '' ?>> Polished</label></th>
        <th><label><input type="radio" name="anatomy_options[texture_set]" value="debut|wool" id="cozy"<?php echo $value == 'debut|wool' ? ' checked="checked"' : '' ?>> Cozy</label></th>
        <th><label><input type="radio" name="anatomy_options[texture_set]" value="stressed|debut" id="extreme"<?php echo $value == 'stressed|debut' ? ' checked="checked"' : '' ?>> Extreme</label></th></tr>
      <tr>
        <td class="texture_container">
          <label for="sterile">
          <div class="border">
            <div class="dark" style="background: #222;"></div>
            <div class="light" style="background: #FFF;"></div>
          </div>
          </label>
        </td>
        <td class="texture_container">
          <label for="polished">
          <div class="border">
            <div class="dark" style="background: url('<?php echo $dark_url; ?>linen.png');"></div>
            <div class="light" style="background: url('<?php echo $light_url; ?>brillant.png');"></div>
          </div>
          </label>
        </td>
        <td class="texture_container">
          <label for="cozy">
          <div class="border">
            <div class="dark" style="background: url('<?php echo $dark_url; ?>debut.png');"></div>
            <div class="light" style="background: url('<?php echo $light_url; ?>wool.png');"></div>
          </div>
          </label>
        </td>
        <td class="texture_container">
          <label for="extreme">
          <div class="border">
            <div class="dark" style="background: url('<?php echo $dark_url; ?>stressed.png');"></div>
            <div class="light" style="background: url('<?php echo $light_url; ?>debut.png');"></div>
          </div>
          </label>
        </td>
    </table>
    <h3 class="description"><i class="icon-arrow-right"></i> Feelings Tip:</h3>
    <p class="description">Even though the difference is subtle, different textures create unique environments for your visitors.<br />
      Set the mood by picking the texture set that does it right.</p>
    <?php
  }

  function anatomy_ambiance_function() {
    $value = anatomy_options( 'inverted_design', 'default' );
    ?>
    <select name="anatomy_options[inverted_design]">
      <option value="default"<?php echo $value == 'default' ? ' selected' : '' ?>>Tranquil: Dark text on light backgrounds</option>
      <option value="inverted"<?php echo $value == 'inverted' ? ' selected' : '' ?>>Vogue: Light text on dark backgrounds</option>
    </select>
    <h3 class="description"><i class="icon-arrow-right"></i> Feelings Tip:</h3>
    <p class="description">For an ambiance that sets people at ease, go with the usual dark-on-light design that people are  accustomed to.<br />
      If you'd rather come across a bit more cutting edge and set a darker tone, offer up an inverted light-on-dark effect.</p>
    <?php
  }
  
  function anatomy_branding_function() {
    echo '';
  }
  
  function anatomy_logo_function() {
    // http://www.justinwhall.com/multiple-upload-inputs-in-a-wordpress-theme-options-page/
    $logo_src  = anatomy_options( 'logo' );
    if ( anatomy_background() ) {
      $logo_styles = 'style="background: url(' . anatomy_background() . ');"';
    } else {
      $inverted = anatomy_options( 'inverted_design', 'default' );
      if ( $inverted == 'default' ) {
        $which = 'FFF';
      } else {
        $which = '000';
      }
      $logo_styles = 'style="background: #' . $which . ';"';
    }
    $content = '<input class="media_upload wp-media-buttons" id="upload_logo" type="text" size="36" name="anatomy_options[logo]" value="'. $logo_src .'" />
    <button class="media_upload_button button add_media button-primary" id="upload_logo_button" type="button"><i class="icon-upload-alt"></i> Upload Logo</button>
    <div class="clear" style="margin-top:10px;"></div>';
    $display = ( !empty( $logo_src ) ) ? '' : 'display: none;';
    $content .= '<div id="logo_preview_box" style="' . $display . '">
      <span id="delete_logo_image"><img src="' . get_stylesheet_directory_uri() . '/images/delete.png" width="16" height="16" /></span>
      <img id="logo_preview" src="' . $logo_src . '" ' . $logo_styles . ' />
    </div>
    <h3 class="description"><i class="icon-arrow-right"></i> Branding Tip:</h3>
    <p class="description">To provide the best user experience, use a version of your logo that is optimized and resized to 420 by 100 pixels.</p>';
    echo $content;
  }
  function anatomy_icons_function() {
    $type = anatomy_options( 'social_icons[type]', 'default' );
    $size = anatomy_options( 'social_icons[size]', 'default' );
    $color = anatomy_options( 'social_icons[color]', 'logo' );
    ?>
      <script>
      function colorChange( option ) {
        jQuery(function($) {
          option = $(option);
          possible = ['logo', 'color_scheme', 'grayscale'];
          possible.splice( $.inArray( option.val(), possible ), 1 );
          // Update the color class
          icons =  $('.social_holder i');
          icons.addClass( option.val() ).removeClass( possible.join(' ') );
          // If color_scheme, then grab the currently selected color and show it, otherwise remove colors
           colors = [ 'default', 'blue', 'red', 'green' ];
          if ( option.val() == 'color_scheme' ) {
            color = $( '#color_scheme' ).val();
            icons.removeClass( colors.join( ' ' ) ).addClass( color );
          } else {
            icons.removeClass( colors.join( ' ' ) );
          }
        });
      }
      <?php $sizes = array( 'small' => 1, 'default' => 2, 'large' => 3  ); ?>
       jQuery(function($) {
            
            $( "#slider" ).slider({
                value: <?php echo $sizes[$size]; ?>,
                min: 1,
                max: 3,
                step: 1,
                slide: function( event, ui ) {
                    if ( ui.value == 1 ) {
                      $( ".social_holder .icons" ).css( 'font-size', '18px' );
                      text = 'small';
                    } else if ( ui.value == 2 ) {
                      $( ".social_holder .icons" ).css( 'font-size', '24px' );
                      text = 'default';
                    } else if ( ui.value == 3 ) {
                      $( ".social_holder .icons" ).css( 'font-size', '32px' );
                      text = 'large';
                    }
                    $( "#size" ).html( text );
                    $( "#size_save" ).val( text );
                }
            });
            $( "#size" ).html( '<?php echo $size; ?>' );
            $( "#size_save" ).val( '<?php echo $size; ?>' );
            <?php
              $pixels = array( 'small' => 18, 'default' => 24, 'large' => 32 ); 
            ?>
            $( ".social_holder .icons" ).css( 'font-size', '<?php echo $pixels[$size] ?>px' );
            colorChange( $( 'input:radio[name="anatomy_options[social_icons][color]"]:checked') );
        });
        </script>
        <h3>Icon Size: <strong><span id="size" style="text-transform:capitalize;"><?php echo $size; ?></span></strong></h3>
        <input type="hidden" name="anatomy_options[social_icons][size]" id="size_save" value="<?php echo $size; ?>" />
        <div id="slider" style="width: 200px;"></div>
         <h3>Icon Style</h3>
    <table border="0" cellspacing="5" cellpadding="5" style="margin-top: 20px; width: 80%;">
      <tr><td>
        <label class="social_holder"><input type="radio" name="anatomy_options[social_icons][type]" value="default"<?php echo ( $type == 'default' ? 'checked' : ''); ?> /> <span class="icons"><i class="icon-facebook"></i> <i class="icon-twitter"></i> <i class="icon-google-plus"></i> <i class="icon-pinterest"></i> <i class="icon-linkedin"></i> <i class="icon-github"></i></span></label></td>
        <td><label class="social_holder"><input type="radio" name="anatomy_options[social_icons][type]" value="sign"<?php echo ( $type == 'sign' ? 'checked' : ''); ?> /> <span class="icons"><i class="icon-facebook-sign"></i> <i class="icon-twitter-sign"></i> <i class="icon-google-plus-sign"></i> <i class="icon-pinterest-sign"></i> <i class="icon-linkedin-sign"></i> <i class="icon-github-sign"></i></span></label>
          </td></tr>
    </table>
      <h3>Icon Colors</h3>
      <table border="0" cellspacing="5" cellpadding="5" width="80%">
        <tr>
          <td><label><input type="radio" name="anatomy_options[social_icons][color]" value="logo"<?php echo ( $color == 'logo' ? 'checked' : ''); ?> onclick="colorChange(this);"/> Social media colors<br />
          <span class="description">Stay true to social media branding to build trust.</span></label></td>
          <td><label><input type="radio" name="anatomy_options[social_icons][color]" value="color_scheme"<?php echo ( $color == 'color_scheme' ? 'checked' : ''); ?> onclick="colorChange(this);"/> Match your emotion<br /><span class="description">Match the emotion you're creating for cohesive branding.</span></label> </td>
          <td><label><input type="radio" name="anatomy_options[social_icons][color]" value="grayscale"<?php echo ( $color == 'grayscale' ? 'checked' : ''); ?> onclick="colorChange(this);"/> Go subtle<br /><span class="description">Offer your icons in gray for an unobtrusive experience.</span></label></td></tr>
      </table>
    <label>
    <?php 
  }
  function anatomy_social_function() {
    ?> <h3>Icon Links</h3>
    <p class="description">Leave the field blank if you don't want the icon for that site to show up.</p>
    <?php
    $sites = array(
      'facebook' => 'Facebook', 
      'twitter' => 'Twitter', 
      'google-plus' => 'Google+',
      'pinterest' => 'Pinterest',
      'linkedin'  => 'LinkedIn',
      'github'    => 'Github'
    );
    
    foreach ( $sites as $slug => $site ) {
      ?>
      <p><?php echo $site ?><br /><input type="text" class="regular-text code" name="anatomy_options[social][<?php echo $slug; ?>]" value="<?php echo anatomy_options( "social[$slug]" ); ?>"></p>
      <?php
    }
  }


#===== USER EXPERIENCE FUNCTIONS =====#

function anatomy_advanced_function() {
}
  
  function anatomy_homepage_function() {
    $cols = anatomy_options( 'homepage_columns', 3 );
    ?>
  	<script>
  	jQuery(document).ready(function($){
    	$(function() {
    	  // Enable sortable options
    		$( "#sortable" ).sortable();
    		$( "#sortable" ).disableSelection();
    		// Columns slider
    		
    		function adjustCols( numCols ) {
    		  if ( numCols == 2 ) {
             $('#columns_value').val( 2 );
             $( '.sort .columns' ).addClass('two').removeClass('three four').html( '<div class="col">Widget</div><div class="col">Widget</div>' );
           } else if ( numCols == 3 ) {
             $('#columns_value').val( 3 );
             $( '.sort .columns' ).addClass('three').removeClass('two four').html( '<div class="col">Widget</div><div class="col">Widget</div><div class="col">Widget</div>' );
           } else if ( numCols == 4 ) {
             $('#columns_value').val( 4 );
             $( '.sort .columns' ).addClass('four').removeClass('three two').html( '<div class="col">Widget</div><div class="col">Widget</div><div class="col">Widget</div><div class="col">Widget</div>' );
           }
    		}
    		
    		 $( "#columns" ).slider({
             value: <?php echo $cols; ?>,
             min: 2,
             max: 4,
             step: 1,
             slide: function( event, ui ) {
                 adjustCols( ui.value );
             }
         });
    		
    		adjustCols( <?php echo $cols; ?> );
    	});
  	});    
  	</script>
  	<ul id="sortable">
  	<?php
  	  $order = anatomy_options( 'homepage_order', array( 'headline', 'columns', 'content' ) );
  	  foreach ( $order as $option ) {
  	    switch ( $option ) {
  	      case 'headline' :
  	        ?>
  	        <li class="sort ui-state-default"><span class="headline">Headline</span>
  	          <input type="hidden" name="anatomy_options[homepage_order][]" value="headline"></li>
  	        <?php
  	        break;
  	      case 'columns' :
  	        ?>
  	        <li class="sort ui-state-default">
  	          <h2>Columns</h2>
  	          <span class="columns three"><span class="col">Widget</span> <span class="col">Widget</span> <span class="col">Widget</span></span>
  	          <input type="hidden" name="anatomy_options[homepage_order][]" value="columns"></li>
  	        <?php
  	        break;
  	      case 'content' :
  	        ?>
  	        <li class="sort ui-state-default"><span class="content">Content</span>
  	          <input type="hidden" name="anatomy_options[homepage_order][]" value="content"></li>
  	        <?php
  	        break;
  	    }
  	  }
  	?>
  	</ul>
  	<div class="col_options"><span class="first">2 Columns</span><span class="middle">3 Columns</span><span class="last">4 Columns</span></div>
  	<div id="columns"></div>
  	<input type="hidden" name="anatomy_options[homepage_columns]" value="3" id="columns_value" />
    <h3 class="description"><i class="icon-arrow-right"></i> User Experience Tip:</h3>
    <p class="description">The story of your homepage will change with time.</p>
    <p class="description">Think about the story you're telling, and adjust exactly how to display that story here.</p>
    <h3><i class="icon-question-sign"></i> Need Guidance?</h3>
    <ul class="faq">
      <li><i class="icon-move"></i> <strong>Drag &amp; Drop:</strong> Use your mouse to drag and drop the order of the homepage layout.</li>
      <li><i class="icon-resize-horizontal"></i> <strong>Slider:</strong> Use the slider above to customize the number of columns for your homepage widgets.</li>
      <li><i class="icon-file"></i> <strong>Homepage Content:</strong> Control what shows in the content area.
        <ul style="margin-left: 2em;">
          <li>Posts or Page? Adjust this in the <a href="<?php echo admin_url( 'options-reading.php' ); ?>">Reading</a> options.</li>
          <li>Full-width or column? If you're using a static page, just adjust the template of your static page options.</li>
        </ul>
        </li>
      <li><i class="icon-columns"></i><strong>Homepage Columns:</strong> Manage what displays in your columns on the <a href="<?php echo admin_url( 'widgets.php' ); ?>">Widgets</a> page. <em>(Each widget gets its own column.)</em></li>
    </ul>
    <?php
  }

  function anatomy_hide_function() {
    ?>
    <h3><i class="icon-home"></i> Tophat</h3>
    <?php 
    $tophat = anatomy_options( 'display[tophat]', true );
    echo '<div><label><input type="checkbox" name="anatomy_options[display][tophat]" value="true"'. ($tophat == 'true' ? ' checked' : '').'> Display tophat</label><p class="description">Shows the top level of navigation.</p>
    <input type="hidden" name="anatomy_options[checkbox][display][tophat]" /></div>';

    $sitename = anatomy_options( 'display[sitename]', true );
    echo '<div><label><input type="checkbox" name="anatomy_options[display][sitename]" value="true"'. ($sitename == 'true' ? ' checked' : '').'> Add automatic home link</label><p class="description">Shows the site name at the beginning of the tophat navigation.</p>
    <input type="hidden" name="anatomy_options[checkbox][display][sitename]" /></div>';
    ?>
    <h3><i class="icon-search"></i> Search Bars</h3>
    <?php
    $top_search = anatomy_options( 'display[top_search]', true );
    $large_search = anatomy_options( 'display[large_search]', false );

    echo '<div><label><input type="checkbox" name="anatomy_options[display][top_search]" value="true"' . ( $top_search == 'true' ? ' checked' : '' ) .  '> Show regular search box</label>
    <p class="description">Shows up in the tophat.</p>
    <input type="hidden" name="anatomy_options[checkbox][display][top_search]"></div>
          <div><label><input type="checkbox" name="anatomy_options[display][large_search]" value="true"' . ( $large_search == 'true' ? ' checked' : '' ) .  '> Show large search box</label>
          <p class="description">Shows up below the logo.</p>
          <input type="hidden" name="anatomy_options[checkbox][display][large_search]"></div>';
          
    ?>
    <h3><i class="icon-info-sign"></i> Post Details</h3>
    <?php
    $value = anatomy_options( 'display[meta_data]', true );
     echo '<div><label><input type="checkbox" name="anatomy_options[display][meta_data]" value="true"'. ($value == 'true' ? ' checked' : '').'> Show post details</label><p class="description">Shows categories, tags and other details throughout the site for each post.</p></div>';
     
     $value = anatomy_options( 'display[author_bio]', true );
     echo '<div><label><input type="checkbox" name="anatomy_options[display][author_bio]" value="true"'. ($value == 'true' ? ' checked' : '').'> Show author bios</label><p class="description">Includes beautiful author bios at the end of each post.</p></div>';
  }
  

/* Register Dictionary Options 
================================================== */
function anatomy_dictionary_function() {}

function anatomy_dictionary_search_function() {
  $value = anatomy_options( 'search_only_entries', false );
  echo '<label><input type="checkbox" name="anatomy_options[search_only_entries]" value="true" id="wpd_theme_options[search_only_entries]"'.( $value == 'true' ? ' checked' : '' ).'> Limit searches to dictionary entries</label>
  <input type="hidden" name="anatomy_options[checkbox][search_only_entries]" />';
}

function anatomy_archive_content_display_function() {
  $value = anatomy_options( 'archive_content_display', false );
  echo '<select name="anatomy_options[archive_content_display]"><option value="title_only"'.( $value == 'title_only' ? ' selected' : '' ).'>Display Title Only</option><option value="whole_entry"'.( $value == 'whole_entry' ? ' selected' : '' ).'>Display Whole Entry</option></select>';
}

function anatomy_archive_sections_function() {
  $value = anatomy_options( 'display_all_entries_in_section', false );
  echo '<label><input type="checkbox" name="anatomy_options[display_all_entries_in_section]" value="true" id="anatomy_options[search_only_entries]"'.( $value == 'true' ? ' checked' : '' ).'> Display all Dictionary entries under each section archive at once</label>
  <input type="hidden" name="anatomy_options[checkbox][display_all_entries_in_section]" value="" />';
}