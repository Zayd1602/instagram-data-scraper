<?php
/**
 * @param array $data
 */
function pre($data = array())
{
    echo '<pre>', print_r($data, true), '</pre>';
    exit(4);
}
/**
 * [load_controller description]
 * @param  [type] $controller [description]
 * @return [type]             [description]
 */
function load_controller($controller)
{
    if (file_exists(Controller_Path . $controller . '.php')) {
        return true;
    } else {
        return false;
    }
}
/**
 * [error_404 description]
 * @return [type] [description]
 */
function error_404()
{
    exit("404: Request page not found");
}
/**
 * [assets description]
 * @param  [type] $path [description]
 * @return [type]       [description]
 */
function assets($path)
{
    return APP_URL . 'public/' . $path;
}
/**
 * [render_template description]
 * @return [type] [description]
 */
function render_template()
{
    $pages =
        array(
        Template_Path . 'Base.header.php',
        Template_Path . 'Base.menu.php',
        View_Path . 'Content.php',
        Template_Path . 'Base.footer.php'
    );
    foreach ($pages as $i => $page) {
        require_once $page;
    }
}
/**
 * Check if Server Supports htaccess
 * @return boolean [description]
 */
function is_hraccess_enable()
{
    // check if mode re_write enabled or not
    if (!in_array('mod_rewrite', apache_get_modules()) || !isset($_SERVER['HTACCESS'])) {
        return false;
    } else {
        return true;
    }

}
