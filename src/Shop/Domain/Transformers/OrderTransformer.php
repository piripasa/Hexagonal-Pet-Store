<?php
namespace Hexa\Shop\Domain\Transformers;

class OrderTransformer extends BaseTransformer
{
    public function transform($object)
    {
        return [
            'id' => (int) $object->id,
            'price' => (double) $object->price,
            'upfront' => (double) $object->upfront,
            'due' => (double) $object->due,
            'status' => (string) $object->status,
            'insurance' => $object->insurance ? $object->insurance->value : ''
        ];
    }
}
