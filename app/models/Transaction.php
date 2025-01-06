<?php

namespace app\models;

use Lorm\BaseModel;

class Transaction extends BaseModel
{
  /**
   * The primary key column
   * @var string
   */
  public $primary_key = "transaction_id";

  /**
   * The model's table name
   * @var string
   */
  public $table = "exam1224_transaction";

  /**
   * The model's column
   * @var string[]
   */
  public $columns = ['transaction_id', 'transaction_user', 'transaction_montant', 'transaction_verif'];

  /**
   * All of the relations to pre-load
   * @var string[]
   */
  public $eager_load = [];

  protected function get_cast(): array
  {
    return [
      'transaction_verif' => fn($e) => $e == 1 ? true : false
    ];
  }

  protected function set_cast(): array
  {
    return [
      'transaction_verif' => fn($e) => $e === true ? 1 : 0
    ];
  }
}
