<?php
namespace KC\Transformers;

use League\Fractal\TransformerAbstract;
use KC\Models\User;

class UserTransformer extends TransformerAbstract {
    public function transform(User $user) {
        return [
          'id' => (int) $user->id,
          'name' => $user->name,
          'email' => $user->email,
        ];
    }
}
