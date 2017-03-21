<?php

namespace KC\Transformers;

use League\Fractal\TransformerAbstract;

class ErrorTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(\Exception $e)
    {
        return [
            'ok' => false, 
            'message' => $e->getMessage()
        ];
    }
}
