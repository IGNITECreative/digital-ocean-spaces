<?php
/**
 * Digital Ocean Spaces plugin for Craft CMS 3.x
 *
 * A Volume Plugin that interacts with Digital Ocean Spaces 
 *
 * @link      clicktoignite.com
 * @copyright Copyright (c) 2018 AJ Griem
 */

namespace ignite\digitaloceanspaces\models;

use ignite\digitaloceanspaces\DigitalOceanSpaces;

use Craft;
use craft\base\Model;

/**
 * @author    nystudio107
 * @package   Disqus
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================


    /**
     * @var string
     */
    public $spacesKey = '';

    /**
     * @var string
     */
    public $spacesSecret = '';

    /**
     * @var string
     */
    public $spacesRegion = '';

    /**
     * @var string
     */
    public $spacesBucket = '';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['spacesKey', 'string'],
            ['spacesSecret', 'string'],
            ['spacesRegion', 'string'],
            ['spacesBucket', 'string'],
        ];
    }
}