<?php

namespace app\models;

use Lorm\BaseModel;

class Type extends BaseModel
{
  /**
   * The primary key column
   * @var string
   */
  public $primary_key = "type_id";

  /**
   * The model's table name
   * @var string
   */
  public $table = "exam1224_type";

  /**
   * The model's column
   * @var string[]
   */
  public $columns = [
    'type_id',
    'type_nom',
  ];

  /**
   * All of the relations to pre-load
   * @var string[]
   */
  public $eager_load = [];

  public function cadeau()
  {
    return $this->hasMany(Cadeau::class, fn($t, $c) => $t->type_id == $c->cadeau_type, 'cadeau');
  }
}
