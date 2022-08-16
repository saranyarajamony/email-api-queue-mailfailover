<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Email;

/**
 * Class EmailTransformer.
 *
 * @package namespace App\Transformers;
 */
class EmailTransformer extends TransformerAbstract
{
    /**
     * Transform the Email entity.
     *
     * @param \App\Entities\Email $model
     *
     * @return array
     */
    public function transform(Email $model)
    {
        return [
             'id'        => (int) $model->id,
            'username'   => $model->username,
            'subject'    => $model->subject,
            'content'    => $model->content,
            'to'         => $model->to,
            'from'       => $model->from
        ];
    }
}
