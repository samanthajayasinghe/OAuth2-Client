<?php
namespace OauthClient;

use OauthClient\Exception\ClientException;

class ClientFactory {

    const OAUTH_VENDOR_NAME_GOOGLE = 'google';

    const OAUTH_VENDOR_NAME_FACEBOOK = 'facebook';

    const OAUTH_VENDOR_NAME_LINKEDIN = 'linkedin';

    /**
     * @param $vendorName
     * @throws ClientException
     */
    public function getClient($vendorName)
    {
        if(!$this->isAllowedVendor($vendorName)){
            throw new ClientException('Vendor not found',404);
        }
        switch ($vendorName) {

            case self::OAUTH_VENDOR_GOOGLE_NAME:

            break;
        }
    }

    /**
     * @return array
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
            self::OAUTH_VENDOR_NAME_GOOGLE,
            self::OAUTH_VENDOR_NAME_FACEBOOK,
            self::OAUTH_VENDOR_NAME_LINKEDIN
        ];
    }
} 
