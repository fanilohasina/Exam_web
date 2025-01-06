<?php 

namespace app\models;

use Lorm\BaseModel;

class User extends BaseModel {
    /**
   * The primary key column
   * @var string
   */
  public $primary_key = "user_id";

  /**
   * The model's table name
   * @var string
   */
  public $table = "exam1224_user";

  /**
   * The model's column
   * @var string[]
   */
  public $columns = ['user_id','user_name','user_password'];

  /**
   * All of the relations to pre-load
   * @var string[]
   */
  public $eager_load = [];

  public function transactions() {
    return $this->hasMany(Transaction::class, fn($u, $t) => $u->user_id == $t->transaction_user, 'transactions');
  }

  public function solde() {
    return array_sum(array_map(fn($e) => $e->transaction_montant, array_filter($this->transactions, fn($e) => $e->transaction_verif))) ?? 0;
  }
}