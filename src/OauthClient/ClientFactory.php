<?php
namespace OauthClient;

use OauthClient\Exception\ClientException;
use OauthClient\Provider\Google;
use OauthClient\Provider\Facebook;
class ClientFactory {

    /**
     * @param $vendorName
     * @throws ClientException
     * @return OauthClient
     */
    public function getClient($vendorName)
    {
        if(!$this->isAllowedVendor($vendorName)){
            throw new ClientException('Vendor not found',404);
        }
        switch ($vendorName) {

            case Config::OAUTH_PROVIDER_NAME_GOOGLE:
                return new Google();
            break;
            case Config::OAUTH_PROVIDER_NAME_FACEBOOK:
                return new Facebook();
            break;
            case Config::OAUTH_PROVIDER_NAME_LINKEDIN:
                return new Linkedin();
            break;
        }
    }

    /**
     * @param $vendorName
     * @return bool
     */
    private function isAllowedVendor($vendorName){
        return in_array(
            $vendorName,
            $this->getAllowedVendors()
        );
    }

    /**
     * @return array
     */
    private function getAllowedVendors(){
        return [
            Config::OAUTH_PROVIDER_NAME_GOOGLE,
            Config::OAUTH_PROVIDER_NAME_FACEBOOK,
            Config::OAUTH_PROVIDER_NAME_LINKEDIN
        ];
    }
} 
