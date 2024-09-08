<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Agente;

use MoonShine\Resources\ModelResource;
use Illuminate\Support\Facades\Request as FacadesRequest;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Agente>
 */
class AgenteResource extends ModelResource
{
    protected string $model = Agente::class;

    protected string $title = 'Agentes';

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected bool $detailInModal = false;

    //redirecciona a la lista de registrados
    public function redirectAfterSave(): string
    {
        $referer = FacadesRequest::header('referer'); 
        return $referer ?: '/';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Nombre'),
                Text::make('Email'),
                Text::make('Telefono')
            ]),
        ];
    }

    /**
     * @param Agente $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
