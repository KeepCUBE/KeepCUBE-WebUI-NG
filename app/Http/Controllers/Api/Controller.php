<?php
namespace KC\Http\Controllers\Api;

use KC\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController
{
  protected function successResponse($message, $code=200) {
    return response()->json([
      'ok' => true,
      'message' => $message
    ], $code);
  }
}
