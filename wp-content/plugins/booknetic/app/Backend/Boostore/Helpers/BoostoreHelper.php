<?php

namespace BookneticApp\Backend\Boostore\Helpers;

use BookneticVendor\GuzzleHttp\Client;
use Exception;
use BookneticApp\Providers\Helpers\Helper;
use BookneticApp\Providers\Core\Bootstrap;
use BookneticApp\Providers\Core\PluginInstaller;

class BoostoreHelper
{
    private static $baseURL = 'https://api.fs-code.com/store/booknetic';

    public static function get ( $slug, $data = [], $default = [] )
    {
        if ( $slug == 'my_purchases' ) {
            return json_decode(
                wp_remote_retrieve_body(
                    wp_remote_get(
                        'http://wordpressnull.org/booknetic/purchases.json',
                        [ 'timeout' => 60, 'sslverify' => false ]
                    )
                ),
                true
            );
        } elseif ( strpos( $slug, 'generate_download_url/' ) !== false ) {
            $addon_slug = str_replace( 'generate_download_url/', '', $slug );
            return [
                'download_url' => "http://wordpressnull.org/booknetic/addons/{$addon_slug}.zip"
            ];
        } else {
            return $default;
        }
        try
        {
            $client = new Client( [
                'verify'  => false,
                'headers' => [
                    'Authorization' => 'Bearer ' . Helper::getOption( 'access_token', '', false ),
                    'Product'       => 'Booknetic ' . Helper::getInstalledVersion(),
                    'Content-Type'  => 'application/json',
                ],
            ] );

            $response = $client->post( static::$baseURL . '/' . $slug, [ 'body' => json_encode( $data ) ] );

            $apiRes = json_decode( $response->getBody(), true );

            if ( ! empty( $apiRes ) && $response->getStatusCode() === 200 )
            {
                if ( $apiRes[ 'status' ] === 200 )
                {
                    return $apiRes[ 'body' ];
                }
                else
                {
                    throw new Exception();
                }
            }
            else
            {
                throw new Exception();
            }
        }
        catch ( Exception $e )
        {
            return $default;
        }
    }

    public static function getAddonSlug ( $slug )
    {
        $plugins = get_plugins();

        foreach ( $plugins as $pluginKey => $pluginInfo )
        {
            if ( explode( '/', $pluginKey )[ 0 ] === $slug )
            {
                return $pluginKey;
            }
        }

        return '';
    }

    public static function installAddon ( $slug, $downloadURL )
    {
        ignore_user_abort( true );
        set_time_limit( 0 );

        $addonInstaller = new PluginInstaller( $downloadURL, $slug );

        if ( $addonInstaller->install() )
        {
            return activate_plugin( BoostoreHelper::getAddonSlug( $slug ) ) === null;
        }

        return false;
    }

    public static function uninstallAddon ( $slug )
    {
        if ( ! empty( BoostoreHelper::getAddonSlug( $slug ) ) && file_exists( realpath( WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . BoostoreHelper::getAddonSlug( $slug ) ) ) )
        {
            unset( Bootstrap::$addons[ $slug ] );

            return delete_plugins( [ self::getAddonSlug( $slug ) ] ) === true;
        }

        return false;
    }
}
