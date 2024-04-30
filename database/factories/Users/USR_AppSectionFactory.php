<?php

namespace Database\Factories\Users;

use App\Models\Users\USR_AppSection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class USR_AppSectionFactory extends Factory
{
    protected $model = USR_AppSection::class;

    public function definition(): array
    {
        return [
            'name' => 'Configuraciones',
            'link' => 'config' ,
            'description' => 'Pagina de nose',
            'icon' => 'people fill',
            'group' => 1
        ];
    }
}
