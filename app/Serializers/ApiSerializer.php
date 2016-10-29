<?php
namespace KC\Serializers;

use League\Fractal\Serializer\ArraySerializer;

class ApiSerializer extends ArraySerializer {
    public function null($message = null)
    {
        $null = ['success' => true];
        if(!empty($message)) {
          $null['message'] = $message;
        }
        return $null;
    }
    public function collection($resourceKey, array $data)
    {
        return array_merge($this->null(),[$resourceKey ?: 'data' => $data]);
    }
    public function item($resourceKey, array $data)
    {
        return array_merge($this->null(),$data);
    }
}
