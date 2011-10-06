<?php
/**
 * USAGE:
 * <?php echo css_url();?>.css_filename
 */

/**
 * css URL
 *
 * Returns the "css_url" item
 *
 * @access    public
 * @return    string
 */
if ( ! function_exists('css_url'))
{
    function css_url()
    {
        $CI =& get_instance();
        return $CI->config->slash_item('base_url') . 'src/css/';
    }
}

/**
 * img URL
 *
 * Returns the "img_url" item
 *
 * @access    public
 * @return    string
 */
if ( ! function_exists('img_url'))
{
    function img_url()
    {
        $CI =& get_instance();
        return $CI->config->slash_item('base_url') . 'src/img/';
    }
}

/**
 * js URL
 *
 * Returns the "js_url" item
 *
 * @access    public
 * @return    string
 */
if ( ! function_exists('js_url'))
{
    function js_url()
    {
        $CI =& get_instance();
        return $CI->config->slash_item('base_url') . 'src/js/';
    }
}

/**
 * icons URL
 *
 * Returns the "icons_url" item
 *
 * @access    public
 * @return    string
 */
if ( ! function_exists('icons_url'))
{
    function icons_url()
    {
        $CI =& get_instance();
        return $CI->config->slash_item('base_url') . 'src/icons/';
    }
}  
?>
