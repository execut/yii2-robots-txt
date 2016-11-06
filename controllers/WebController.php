<?php
/**
 * Created by PhpStorm.
 * User: execut
 * Date: 14.06.16
 * Time: 17:13
 */

namespace execut\robotsTxt\controllers;

use execut\robotsTxt\Generator;
use \yii\web\Controller;
use \yii;
class WebController extends \yii\web\Controller
{
    /**
     * Action for sitemap/default/robot-txt
     *
     * @access public
     * @return string
     */
    public function actionIndex()
    {
        /**
         * @var Generator $generator
         */
        $generator = $this->module->generator;
        $response = Yii::$app->response;
        $response->format = yii\web\Response::FORMAT_RAW;
        $response->headers->set('Content-Type', 'text/plain');

        return $generator->render();
    }
}