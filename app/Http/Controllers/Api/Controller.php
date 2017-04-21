<?php
namespace KC\Http\Controllers\Api;

use KC\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController
{
  protected function response($message, $data = [], $code=200) {
    $payload = array_merge([
      'ok' => true,
      'message' => $message
    ], $data);

    return response()->json($payload, $code);
  }
}
