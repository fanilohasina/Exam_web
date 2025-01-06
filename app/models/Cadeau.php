<?php

namespace app\models;

use Lorm\BaseModel;

class Cadeau extends BaseModel
{
    /**
     * The primary key column
     * @var string
     */
    public $primary_key = "cadeau_id";

    /**
     * The model's table name
     * @var string
     */
    public $table = "exam1224_cadeau";

    /**
     * The model's column
     * @var string[]
     */
    public $columns = [
        'cadeau_id',
        'cadeau_name',
        'cadeau_description',
        'cadeau_image',
        'cadeau_prix',
        'cadeau_type',
    ];

    /**
     * All of the relations to pre-load
     * @var string[]
     */
    public $eager_load = [];

    public function type()
    {
        return $this->belongsTo(Type::class, fn($c, $t) => $c->cadeau_type == $t->type_id, 'type');
    }

    protected function get_cast(): array
    {
        return ['cadeau_description' => fn($e) => empty($e) ? '' : $e];
    }
}