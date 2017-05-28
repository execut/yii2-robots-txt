<?php
/**
 * Created by PhpStorm.
 * User: execut
 * Date: 14.06.16
 * Time: 17:12
 */

namespace execut\robotsTxt;


use yii\base\Component;
use yii\helpers\Url;
use yii;

class Generator extends Component
{
    /** @var sting */
    public $host = '';
    /** @var string */
    public $sitemap = '';
    /** @var array */
    public $userAgent = [];
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (empty($this->host)) {
            if (Yii::$app->request->IsSecureConnection) {
                $this->host = Yii::$app->request->hostInfo;
            } else {
                $this->host = Yii::$app->request->serverName;
            }
        }
    }
    /**
     * render robots.txt
     *
     * @return string
     */
    public function render()
    {
        $result = "";
        $params = [];
        $params['Host'] = $this->host;
        $siteMap = $this->sitemap;
        if (is_array($siteMap)) {
            $siteMap = Url::to($siteMap, true);
        }

        $params['Sitemap'] = $siteMap;
        foreach (array_filter($params) as $key => $value) {
            $result .= "$key: $value\n";
        }
        foreach ($this->userAgent as $userAgent => $value) {
            $result .= "User-agent: $userAgent\n";
            foreach ($value as $param => $urls) {
                if (is_string($urls)) {
                    $urls = [$urls];
                }

                $isWithScheme = false;
                if ($param == 'Sitemap') {
                    $urls = [$urls];
                    $isWithScheme = true;
                }

                foreach ($urls as $url) {
                    if (is_array($url)) {
                        $url = Url::to($url, $isWithScheme);
                    }

                    $result .= "$param: $url\n";
                }
            }
        }
        return $result;

    }
}