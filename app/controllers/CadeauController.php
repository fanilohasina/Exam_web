<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\Cadeau;
use app\models\Type;
use flight\Engine;

class CadeauController
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

    public function cadeau()
    {
        $user = auth()->get();
        piewpiew('formcadeau', compact('user'));
    }

    public function docadeau()
    {
        $nombres = [];
        $solde = auth()->get()->solde();
        $typesModel = Type::all(['eager_load' => ['cadeau']]);
        $types = array_map(fn($e) => ['id' => $e->type_id, 'nom' => $e->type_nom], $typesModel);
    
        foreach($typesModel as $type) {
            $nbr = 0;
            if(!empty($a = ($_GET[$type->type_nom] ?? false)) && is_numeric($a) && $a > 0){
                $nbr = $a;
            }
            $nombres[$type->type_id] = $nbr; 
        }
    
        $cadeaux = [];

        foreach ($typesModel as $type) {
            $cadeaux[$type->type_id] = [];
            foreach ($type->cadeau as $cadeau) $cadeaux[$type->type_id][] = [
                'id' => $cadeau->cadeau_id,
                'name' => $cadeau->cadeau_name,
                'description' => $cadeau->cadeau_description,
                'image' => $cadeau->cadeau_image,
                'prix' => $cadeau->cadeau_prix,
                'type' => $cadeau->cadeau_type
            ];
        }

        piewpiew('listeCadeaux', compact('cadeaux', 'types', 'solde', 'nombres'));
    }
}