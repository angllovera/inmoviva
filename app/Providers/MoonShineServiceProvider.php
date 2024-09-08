<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\AgenteResource;
use App\MoonShine\Resources\TipoPropiedadResource;
use App\MoonShine\Resources\UsuarioResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),

            /*MenuItem::make('Documentation', 'https://moonshine-laravel.com/docs')
                ->badge(fn() => 'Check')
                ->blank(),*/

            MenuGroup::make(static fn() => __('Usuarios'), [
                MenuItem::make('Usuarios', new UsuarioResource),
                MenuItem::make('Agentes', new AgenteResource)
            ]),

            MenuGroup::make(static fn() => __('Propiedades'), [
                MenuItem::make('Tipo de Propiedad', new TipoPropiedadResource),
                //MenuItem::make('Agentes', new AgenteResource)
            ]),


            //MenuItem::make('Usuarios', new UsuarioResource)
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
