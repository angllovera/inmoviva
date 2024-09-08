<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use Illuminate\Support\Facades\Request as FacadesRequest;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Usuario>
 */
class UsuarioResource extends ModelResource
{
    protected string $model = Usuario::class;

    protected string $title = 'Usuarios';

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
                Text::make('nombre'),
                Text::make('email'),
                Text::make('telefono')
            ]),
        ];
    }

    /**
     * @param Usuario $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
