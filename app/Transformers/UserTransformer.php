<?php
namespace KC\Transformers;

use League\Fractal\TransformerAbstract;
use KC\Models\User\User;

class UserTransformer extends TransformerAbstract {
    public function transform($user) {
        return [
          'id' => (int) $user->id,
          'name' => $user->name,
          'email' => $user->email
        ];
    }
}
