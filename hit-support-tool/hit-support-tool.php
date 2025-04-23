<?php

/**
 * Plugin Name: HIT-Support-Tool
 * Plugin URI: https://heinsen-it.de/tools/plugins-wordpress/
 * Description: Plugin für Support-Funktionen in WordPress
 * Version: 0.0.1.0
 * Author: Heinsen-IT
 * Author URI: https://heinsen-it.de
 * License: GPL2
 * Letztes Update: 2025-04-16 20:00:00
 * MINIMAL WP: 6.4.0
 * MINIMAL PHP: 8.2.0
 * Tested WP: 6.7.1
 */

// Direktzugriff verhindern
if (!defined('ABSPATH')) {
    exit;
}

// Autoloader für Namespaces definieren
spl_autoload_register(function ($class) {
    // Basis-Namespace für das Plugin
    $namespace = 'HITSupportTool\\';

    // Prüfen, ob die angeforderte Klasse zu unserem Namespace gehört
    if (strpos($class, $namespace) !== 0) {
        return;
    }

    // Entferne den Plugin-Namespace
    $class = str_replace($namespace, '', $class);

    // Konvertiere Namespace-Trenner in Verzeichnis-Trenner
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // Pfad zur Datei erstellen
    $file = plugin_dir_path(__FILE__) .  strtolower($class) . '.php';

    // Datei laden, wenn sie existiert
    if (file_exists($file)) {
        require_once $file;
    }
});

// Plugin-Konstanten definieren
define('HITSUPPORTTOOL_VERSION', '0.0.1.0');
define('HITSUPPORTTOOL_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('HITSUPPORTTOOL_PLUGIN_URL', plugin_dir_url(__FILE__));
define('HITSUPPORTTOOL_PLUGIN_BASENAME', plugin_basename(__FILE__));

// Plugin initialisieren
function hitsupporttool_init()
{
    // Hauptklasse aus dem Core-Namespace laden und initialisieren
    return \HITSupportTool\App\Classes\Core\Plugin::get_instance();
}

// Das Plugin starten
hitsupporttool_init();
