<?php
/**
 * Digital Ocean Spaces plugin for Craft CMS 3.x
 *
 * A Volume Plugin that interacts with Digital Ocean Spaces 
 *
 * @link      clicktoignite.com
 * @copyright Copyright (c) 2018 AJ Griem
 */

namespace ignite\digitaloceanspaces;


use Craft;
use craft\events\RegisterComponentTypesEvent;
use craft\events\RegisterUrlRulesEvent;
use craft\events\TemplateEvent;
use craft\helpers\Console as ConsoleHelper;
use craft\services\Volumes;
use craft\web\Application as WebApplication;
use craft\web\UrlManager;
use craft\web\View;
use yii\base\Event;
use yii\base\InvalidConfigException;
use yii\console\Application as ConsoleApplication;

/**
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 *
 * @author    AJ Griem
 * @package   DigitalOceanSpaces
 * @since     0.0.1
 *
 */
class Plugin extends \craft\base\Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * DigitalOceanSpaces::$plugin
     *
     * @var DigitalOceanSpaces
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * To execute your plugin’s migrations, you’ll need to increase its schema version.
     *
     * @var string
     */
    public $schemaVersion = '0.0.1';

    // Public Methods
    // =========================================================================

    /**
     * Set our $plugin static property to this class so that it can be accessed via
     * DigitalOceanSpaces::$plugin
     *
     * Called after the plugin class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     *
     */
    public function init()
    {
        self::$plugin = $this;
        parent::init();

        Event::on(
            Volumes::class,
            Volumes::EVENT_REGISTER_VOLUME_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = Volume::class;
            }
        );
    }

    // Protected Methods
    // =========================================================================

}
