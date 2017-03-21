<?php
namespace KC\Serializers;

use Spatie\Fractalistic\ArraySerializer;

class ApiSerializer extends ArraySerializer {
    public function null($message = null)
    {
        $null = ['ok' => true];
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
