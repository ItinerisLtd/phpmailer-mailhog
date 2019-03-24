<?php
declare(strict_types=1);

/**
 * Plugin Name:     PHPMailer MailHog
 * Plugin URI:      https://github.com/itinerisltd/phpmailer-mailhog
 * Description:     Use MailHog on development environment.
 * Version:         0.1.0
 * Author:          Itineris Limited
 * Author URI:      https://www.itineris.co.uk/
 * Text Domain:     phpmailer-mailhog
 */

namespace Itineris\PHPMailer\MailHog;

use PHPMailer;

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

add_action('phpmailer_init',  function (PHPMailer $phpMailer): void {
    if (! defined('WP_ENV') || 'development' !== constant('WP_ENV')) {
        wp_die('PHPMailer MailHog should not be install on non-development environment. Re-run `$ composer require` with `--dev` flag.');
    }

    $phpMailer->Host = '127.0.0.1';
    $phpMailer->Port = 1025;
    $phpMailer->isSMTP();
}, 99999);
