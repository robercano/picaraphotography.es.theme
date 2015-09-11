<?php
/**
 * Initialize the custom theme options.
 */
custom_theme_options();

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
  /* OptionTree is not loaded yet */
  if ( ! function_exists( 'ot_settings_id' ) )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => 'General'
      ),
      array(
        'id'          => 'style',
        'title'       => 'Style'
      ),
      array(
        'id'          => 'social',
        'title'       => 'Social'
      ),
      array(
        'id'          => 'sharing',
        'title'       => 'Sharing'
      ),
      array(
        'id'          => 'display',
        'title'       => 'Display'
      ),
      array(
        'id'          => 'fonts',
        'title'       => 'Fonts'
      ),
      array(
        'id'          => 'other',
        'title'       => 'Other'
      ),
      array(
        'id'          => 'updates',
        'title'       => 'Updates'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'demo_import',
        'label'       => 'Demo content import',
        'desc'        => '',
        'std'         => '',
        'type'        => 'bw-import-data',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'logo',
        'label'       => 'Logo',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'fav_icon',
        'label'       => 'Fav icon',
        'desc'        => 'Icon must be: 16px X 16px or 32px X 32px',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_text',
        'label'       => 'Footer text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'main_color',
        'label'       => 'Main color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'style',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'background_color',
        'label'       => 'Background color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'style',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'header_footer_bg',
        'label'       => 'Header and Footer background color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'style',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'custom_css',
        'label'       => 'Custom CSS',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'style',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'custom_js',
        'label'       => 'Custom JavaScript',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'style',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'social_icons',
        'label'       => 'Social icons',
        'desc'        => 'Click the "Add New" button, choose the social media and add the url, example: http://www.facebook.com/envato',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'social_media',
            'label'       => 'Social media',
            'desc'        => '',
            'std'         => '',
            'type'        => 'select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and',
            'choices'     => array( 
              array(
                'value'       => 'aboutme',
                'label'       => 'Aboutme',
                'src'         => ''
              ),
              array(
                'value'       => 'aol',
                'label'       => 'Aol',
                'src'         => ''
              ),
              array(
                'value'       => 'amazon',
                'label'       => 'Amazon',
                'src'         => ''
              ),
              array(
                'value'       => 'apple',
                'label'       => 'Apple',
                'src'         => ''
              ),
              array(
                'value'       => 'appstore',
                'label'       => 'Appstore',
                'src'         => ''
              ),
              array(
                'value'       => 'bebo',
                'label'       => 'Bebo',
                'src'         => ''
              ),
              array(
                'value'       => 'behance',
                'label'       => 'Behance',
                'src'         => ''
              ),
              array(
                'value'       => 'bing',
                'label'       => 'Bing',
                'src'         => ''
              ),
              array(
                'value'       => 'blogger',
                'label'       => 'Blogger',
                'src'         => ''
              ),
              array(
                'value'       => 'dribble',
                'label'       => 'Dribble',
                'src'         => ''
              ),
              array(
                'value'       => 'delicious',
                'label'       => 'Delicious',
                'src'         => ''
              ),
              array(
                'value'       => 'diggalt',
                'label'       => 'Diggalt',
                'src'         => ''
              ),
              array(
                'value'       => 'ebay',
                'label'       => 'Ebay',
                'src'         => ''
              ),
              array(
                'value'       => 'email',
                'label'       => 'Email',
                'src'         => ''
              ),
              array(
                'value'       => 'facebook',
                'label'       => 'Facebook',
                'src'         => ''
              ),
              array(
                'value'       => 'googleplus',
                'label'       => 'Google plus',
                'src'         => ''
              ),
              array(
                'value'       => 'pinterest',
                'label'       => 'Pinterest',
                'src'         => ''
              ),
              array(
                'value'       => 'instagram',
                'label'       => 'Instagram',
                'src'         => ''
              ),
              array(
                'value'       => 'linkedin',
                'label'       => 'Linkedin',
                'src'         => ''
              ),
              array(
                'value'       => 'skype',
                'label'       => 'Skype',
                'src'         => ''
              ),
              array(
                'value'       => 'tumblr',
                'label'       => 'Tumblr',
                'src'         => ''
              ),
              array(
                'value'       => 'githubalt',
                'label'       => 'Github',
                'src'         => ''
              ),
              array(
                'value'       => 'flickr',
                'label'       => 'Flickr',
                'src'         => ''
              ),
              array(
                'value'       => 'foodspotting',
                'label'       => 'Foodspotting',
                'src'         => ''
              ),
              array(
                'value'       => 'googlebuzz',
                'label'       => 'Googlebuzz',
                'src'         => ''
              ),
              array(
                'value'       => 'gowallapin',
                'label'       => 'Gowallapin',
                'src'         => ''
              ),
              array(
                'value'       => 'grooveshark',
                'label'       => 'Grooveshark',
                'src'         => ''
              ),
              array(
                'value'       => 'heart',
                'label'       => 'Heart',
                'src'         => ''
              ),
              array(
                'value'       => 'icq',
                'label'       => 'Icq',
                'src'         => ''
              ),
              array(
                'value'       => 'imessage',
                'label'       => 'Imessage',
                'src'         => ''
              ),
              array(
                'value'       => 'itunes',
                'label'       => 'Itunes',
                'src'         => ''
              ),
              array(
                'value'       => 'lastfm',
                'label'       => 'Lastfm',
                'src'         => ''
              ),
              array(
                'value'       => 'mobileme',
                'label'       => 'Mobileme',
                'src'         => ''
              ),
              array(
                'value'       => 'myspace',
                'label'       => 'Myspace',
                'src'         => ''
              ),
              array(
                'value'       => 'picasa',
                'label'       => 'Picasa',
                'src'         => ''
              ),
              array(
                'value'       => 'soundcloud',
                'label'       => 'Soundcloud',
                'src'         => ''
              ),
              array(
                'value'       => 'star',
                'label'       => 'Star',
                'src'         => ''
              ),
              array(
                'value'       => 'twitter',
                'label'       => 'Twitter',
                'src'         => ''
              ),
              array(
                'value'       => 'vimeo',
                'label'       => 'Vimeo',
                'src'         => ''
              ),
              array(
                'value'       => 'wordpress',
                'label'       => 'Wordpress',
                'src'         => ''
              ),
              array(
                'value'       => 'yahoo',
                'label'       => 'Yahoo',
                'src'         => ''
              ),
              array(
                'value'       => 'youtube',
                'label'       => 'Youtube',
                'src'         => ''
              ),
              array(
                'value'       => 'fivehundredpx',
                'label'       => '500px',
                'src'         => ''
              )
            )
          ),
          array(
            'id'          => 'social_url',
            'label'       => 'Url',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
      array(
        'id'          => 'share_buttons_description',
        'label'       => 'Share services',
        'desc'        => 'Add here the share services you want to use, single comma delimited (no spaces). You can find the full list of services <a href="http://www.addthis.com/services/list" target="_blank">here</a> Also you can use the more tag to show the plus sign and the counter tag to show a global share counter.

<strong>Important</strong>: If you want to allow AddThis to show your visitors personalized lists of share buttons you can use the preferred tag. More about this <a href="http://bit.ly/1fLP69i" target="_blank">here</a>',
        'std'         => '',
        'type'        => 'bw-text-content',
        'section'     => 'sharing',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'enable_photo_sharing',
        'label'       => 'Enable photo sharing',
        'desc'        => '',
        'std'         => '',
        'type'        => 'bw-on-off',
        'section'     => 'sharing',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'share_buttons_settings',
        'label'       => 'Add share services',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'sharing',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'image_copyright',
        'label'       => 'Image protection',
        'desc'        => 'This options will disable the mouse right click',
        'std'         => '',
        'type'        => 'bw-on-off',
        'section'     => 'display',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'image_protection_notification',
        'label'       => 'Image protection notification',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'display',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hide_single_image_titles',
        'label'       => 'Hide single image titles',
        'desc'        => '',
        'std'         => '',
        'type'        => 'bw-on-off',
        'section'     => 'display',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'disable_ajax_loading',
        'label'       => 'Disable ajax loading',
        'desc'        => 'Disable ajax loading if you want to include any plugins or you have any layout problem.',
        'std'         => '',
        'type'        => 'bw-on-off',
        'section'     => 'display',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hide_pattern',
        'label'       => 'Hide pattern?',
        'desc'        => 'Activate if you want to remove the photo dot effect.',
        'std'         => '',
        'type'        => 'bw-on-off',
        'section'     => 'display',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Yes',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'patter_type',
        'label'       => 'Pattern type',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'display',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'dot',
            'label'       => 'Default dotted pattern',
            'src'         => ''
          ),
          array(
            'value'       => 'diagonal',
            'label'       => 'Diagonal line pattern',
            'src'         => ''
          ),
          array(
            'value'       => 'vertical',
            'label'       => 'Vertical line pattern',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'show_vertical_scrollbar',
        'label'       => 'Always display vertical scrollbar',
        'desc'        => 'Keeps page centered in all browsers regardless of content height',
        'std'         => '',
        'type'        => 'bw-on-off',
        'section'     => 'display',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Show',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'show_wp_bar',
        'label'       => 'Disable wp admin bar',
        'desc'        => '',
        'std'         => '',
        'type'        => 'bw-on-off',
        'section'     => 'display',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Disable',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'disable_sidebar',
        'label'       => 'Disable Sidebar',
        'desc'        => '',
        'std'         => '',
        'type'        => 'bw-on-off',
        'section'     => 'display',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Disable',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'blog_layout',
        'label'       => 'Blog layout',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'display',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'default',
            'label'       => 'Default',
            'src'         => ''
          ),
          array(
            'value'       => 'classic',
            'label'       => 'Classic',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'custom_fonts_description',
        'label'       => 'Custom fonts',
        'desc'        => 'In this page you can set the typefaces to be used throughout the theme. For each elements listed below you can choose any front from the Google Web Font library. Once you have chosen a font from the list, you will see a preview of this font immediately beneath the list box. The icons on the bottom of the font preview, indicate what weights are available for that typeface.

R -- Regular,
B -- Bold,
I -- Italics,
BI -- Bold Italics

When deciding what font to use, ensure that the chosen font contains the font weight required by the element. For example, main headings are bold, so you need to select a new font for these elements which supports a bold font weight. If you select a font which does not have a bold icon, the font will not be applied.

Browse the online Google Font Library

Custom fonts (Advanced Users):
Other then those available from Google fonts, custom fonts may also be applied to the elements listed below. To do this an additional field is provided below the google fonts list. Here you may enter the details of a font family, size, line-height etc. for a custom font. This information is entered in the form of the shorthand \'font:\' CSS declaration, for example:

bold italic small-caps 1em/1.5em arial,sans-serif

If a font is specified in this field then the font listed in the Google font drop menu above will not be applied to the element in question. If you wish to use the Google font specified in the drop down list and just specify a new font size or line height, you can do so in this field also, however the name of the Google font MUST also be entered into this field. You may need to visit the Google fonts web page to find the exact CSS name for the font you have chosen.',
        'std'         => '',
        'type'        => 'bw-text-content',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_font',
        'label'       => 'Heading font',
        'desc'        => 'Add a Google font to replace the default one. Example "Open Sans"',
        'std'         => '',
        'type'        => 'bw-select-font',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'titles_weight',
        'label'       => 'Titles weight',
        'desc'        => 'The weight of the font. ex: 300 Leave empty for default font weight.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'body_font',
        'label'       => 'Body font',
        'desc'        => 'Add a Google font to replace the default one. Example "Open Sans"',
        'std'         => '',
        'type'        => 'bw-select-font',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'body_weight',
        'label'       => 'Body weight',
        'desc'        => 'The weight of the font. ex: 300 Leave empty for default font weight.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'analytics_id',
        'label'       => 'Google Analytics Id',
        'desc'        => 'Please insert only the Google Analytic ID. The tracking ID is a string like UA-000000-01',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'other',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'updates_description',
        'label'       => 'Theme one-click update',
        'desc'        => 'Let us notify you when new versions of this theme are live on ThemeForest! Update with just one button click using the Envato WordPress Toolkit. Forget about manual updates!
<strong>IMPORTANT</strong>: Please make sure that you have installed and activated the Envato Wordpress Toolkit plugin, included in the required plugins of the theme.',
        'std'         => '',
        'type'        => 'bw-text-content',
        'section'     => 'updates',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'enable_updates',
        'label'       => 'Enable update notifications',
        'desc'        => 'Check this options if you want to check if there is an update available for the current theme.',
        'std'         => '',
        'type'        => 'bw-on-off',
        'section'     => 'updates',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}