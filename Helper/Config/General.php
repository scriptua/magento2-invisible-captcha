<?php
/**
 * Copyright (c) 2019. Volodymyr Hryvinskyi.  All rights reserved.
 * @author: <mailto:volodymyr@hryvinskyi.com>
 * @github: <https://github.com/hryvinskyi>
 */

declare(strict_types=1);

namespace Hryvinskyi\InvisibleCaptcha\Helper\Config;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Class General
 */
class General extends AbstractHelper
{
    /**
     * Configuration path
     */
    const CONFIG_PATH_GENERAL_ENABLE_MODULE = 'hryvinskyi_invisible_captcha/general/enabledCaptcha';
    const CONFIG_PATH_GENERAL_SITE_KEY = 'hryvinskyi_invisible_captcha/general/captchaSiteKey';
    const CONFIG_PATH_GENERAL_SECRET_KEY = 'hryvinskyi_invisible_captcha/general/captchaSecretKey';

    /**
     * Is google recaptcha enable global
     *
     * @param string $scopeType
     * @param mixed $scopeCode
     *
     * @return bool
     */
    public function hasEnabled(
        string $scopeType = ScopeInterface::SCOPE_WEBSITE,
        $scopeCode = null
    ): bool {
        return $this->scopeConfig->isSetFlag(
            self::CONFIG_PATH_GENERAL_ENABLE_MODULE,
            $scopeType,
            $scopeCode
        );
    }

    /**
     * Return Captcha Key
     *
     * @param string $scopeType
     * @param mixed $scopeCode
     *
     * @return string
     */
    public function getSiteKey(
        string $scopeType = ScopeInterface::SCOPE_WEBSITE,
        $scopeCode = null
    ): string {
        return $this->scopeConfig->getValue(
            self::CONFIG_PATH_GENERAL_SITE_KEY,
            $scopeType,
            $scopeCode
        );
    }

    /**
     * Return Secret Key
     *
     * @param string $scopeType
     * @param mixed $scopeCode
     *
     * @return string
     */
    public function getSecretKey(
        string $scopeType = ScopeInterface::SCOPE_WEBSITE,
        $scopeCode = null
    ): string {
        return $this->scopeConfig->getValue(
            self::CONFIG_PATH_GENERAL_SECRET_KEY,
            $scopeType,
            $scopeCode
        );
    }

    /**
     * Get config by path
     *
     * @param $path
     * @param null $storeId
     * @param string $scope
     *
     * @return mixed
     */
    public function getConfigValueByPath(
        $path,
        $storeId = null,
        $scope = ScopeInterface::SCOPE_WEBSITE
    ) {
        return $this->scopeConfig->getValue($path, $scope, $storeId);
    }
}