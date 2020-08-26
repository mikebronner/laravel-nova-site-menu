# Pages for Laravel and Nova
Drop-in functionality for site menus in Laravel and Nova.

## Installation & Customization
### Standard
If you are creating a simple app, these two steps should suffice. However, if
you need to customize things a bit more, skip these steps and move on to the
**Customized** section.
1. `composer require genealabs/laravel-nova-site-menu`
2. `php artisan migrate`

### Customized
The following steps should cover any special circumstances you might have for
your app, like getting this package to work with multi-tenancy, etc.
1. `composer require genealabs/laravel-nova-site-menu`
2. If you need to customize the migrations:
  ```sh
  php artisan vendor:publish --provider="GeneaLabs\\LaravelNovaSiteMenu\\Providers\\Service" --tag=migrations
  ```
3. Customize migrations as necessary.
4. If you need to customize the Page class, create a new file at
  `app\Overrides\LaravelNovaSiteMenu\Menu.php` and `app\Overrides\LaravelNovaSiteMenu\MenuItem.php`.
  The following example includes options for making Pages multi-tenant-aware.
  Customize to your needs:
  ```php
  <?php

  namespace App\Overrides\LaravelNovaPages;

  use GeneaLabs\LaravelNovaSiteMenu\Menu as LaravelNovaSiteMenuMenu;
  // use Hyn\Tenancy\Traits\UsesTenantConnection;

  class Menu extends LaravelNovaSiteMenuMenu
  {
      // use UsesTenantConnection;
  }
  ```
5. Specify that the package should use your customized `Menu` class, instead of
  the default, by adding the following line to `app/Providers/AppServiceProvider.php`'s
  boot method, and also ignore the default migrations, if you chose to customize
  them above:
  ```php
  <?php

  namespace App\Providers;

  use App\Overrides\LaravelNovaSiteMenu\Menu;
  use GeneaLabs\LaravelNovaSiteMenu\Menu as LaravelNovaSiteMenuMenu;
  use Illuminate\Support\ServiceProvider;

  class AppServiceProvider extends ServiceProvider
  {
      public function register()
      {
          // ignore the default migration, if you customized them
          LaravelNovaSiteMenuMenu::ignoreMigrations();
      }

      public function boot()
      {
          // tell the package to use your customized model
          LaravelNovaSiteMenuMenu::useModel(Menu::class);
      }
  }
  ```

## Usage
### Nova

### Seeder
