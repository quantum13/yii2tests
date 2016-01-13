<?php

namespace app\modules\site\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class BaseController extends Controller
{

    /**
     * Возвращает объект Response с установленными заголовками json
     *
     * @param $content
     * @return Response
     */
    public function jsonResponse($content)
    {
        $response = Yii::$app->response;

        $response->headers->add('Content-Type', 'application/json');
        $response->data = $content;
        $response->format = Response::FORMAT_JSON;

        return $response;
    }

    /**
     * Возвращает объект Response c параметром error с установленными заголовками json
     * используется для возвращения ошибок
     *
     * @param $message
     * @return Response
     */
    public function jsonErrorResponse($message)
    {
        return $this->jsonResponse(['error' => $message]);
    }

    /**
     * Возвращает объект Response
     *
     * @param $content
     * @return Response
     */
    public function htmlResponse($content = '')
    {
        $response = Yii::$app->response;
        $response->data = $content;
        $response->format = Response::FORMAT_HTML;

        return $response;
    }

    /**
     * Возвращает объект Response, который возвращает файл
     *
     * @param $content
     * @return Response
     */
    public function fileResponse($content = '', $contentType = 'application/octet-stream', $filename = '')
    {
        $response = Yii::$app->response;
        return $response->sendContentAsFile($content, $filename, [
            'mimeType' => $contentType,
        ]);
    }
}
