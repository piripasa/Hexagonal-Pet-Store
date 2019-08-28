<?php
namespace Hexa\Shop\Domain\Transformers;

class UserTransformer extends BaseTransformer
{
    public function transform($object)
    {
        return [
            'id' => (int) $object->id,
            'name' => (string) $object->name,
            'email' => (string) $object->email,
            'phone' => (string) $object->phone
        ];
    }
}
