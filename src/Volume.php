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

use Aws\Handler\GuzzleV6\GuzzleHandler;
use Aws\S3\S3Client;
use Craft;
use craft\base\FlysystemVolume;
use craft\helpers\DateTimeHelper;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

/**
 * Class Volume
 *
 * @property mixed  $settingsHtml
 * @property string $rootUrl
 *
 * @link      clicktoignite.com
 * @copyright Copyright (c) 2018 AJ Griem
 */
class Volume extends FlysystemVolume
{

	// Static
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return 'Digital Ocean Space';
    }

    // Properties
    // =========================================================================

    /**
     * @var bool Whether this is a local source or not. Defaults to false.
     */
    protected $isVolumeLocal = false;

    /**
     * @var string Digital Ocean Key
     */
    public $keyId = '';

    /**
     * @var string Digital Ocean Secret
     */
    public $secret = '';

    /**
     * @var string Space to use
     */
    public $spaceName = '';

    /**
     * @var string Region to use
     */
    public $region = '';

    /**
     * @var string Default Visibility
     */
    public $visibility = 'public';

    /**
     * @var string Subfolder to use
     */
    public $subfolder = '';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getRootUrl()
    {
        if (($rootUrl = parent::getRootUrl()) !== false && $this->subfolder) {
            $rootUrl .= rtrim($this->subfolder, '/') . '/';
        }
        return $rootUrl;
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('digitaloceanspaces/volumeSettings', [
            'volume' => $this
        ]);
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     *
     * @return AwsS3Adapter
     */
    
    /**
     * @inheritdoc
     *
     * @return AwsS3Adapter
     */
    protected function createAdapter()
    {
        $config = [
            'version'      => 'latest',
            'region'       => $this->region,
            'endpoint'     => 'https://'. $this->region . '.digitaloceanspaces.com',
            'visibility' => $this->visibility,
            'http_handler' => new GuzzleHandler(Craft::createGuzzleClient()),
            'credentials'  => [
                'key'    => $this->keyId,
                'secret' => $this->secret
            ]
        ];
        $client = static::client($config);
        return new AwsS3Adapter($client, $this->spaceName, $this->subfolder);
    }
    /**
     * Get the Amazon S3 client.
     *
     * @param $config
     *
     * @return S3Client
     */
    protected static function client(array $config = []): S3Client
    {
        return new S3Client($config);
    }

     /**
     * @inheritdoc
     */
    protected function addFileMetadataToConfig(array $config): array
    {
        if (!empty($this->expires) && DateTimeHelper::isValidIntervalString($this->expires)) {
            $expires = new \DateTime();
            $now     = new \DateTime();
            $expires->modify('+' . $this->expires);
            $diff                   = $expires->format('U') - $now->format('U');
            $config['CacheControl'] = 'max-age=' . $diff . ', must-revalidate';
        }
        return parent::addFileMetadataToConfig($config);
    }
}
