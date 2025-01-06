<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\Transaction;
use Flight;
use flight\Engine;

class TransactionController
{
    /** @var Engine */
    protected Engine $app;

    /**
     * Constructor
     */
    public function __construct(Engine $app)
    {
        $this->app = $app;
    }

    public function recharge() {
        $user = auth()->get();
        $solde = $user->solde();
        piewpiew('recharge', compact('user', 'solde'));
    }

    public function dorecharge() {
        $user = auth()->get();
        $montant = $_POST['montant'];
        
        if(empty($montant) || !is_numeric($montant) || $montant <= 0) {
            Flight::redirect('recharge?error=Montant invalide');
            return;
        }

        Transaction::create([
            'transaction_montant' => $montant,
            'transaction_user' => $user->user_id,
            'transaction_verif' => 0
        ]);

        Flight::redirect('recharge');
    }
}