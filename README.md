# cup-anag-module
Laravel cupparis app - modulo anagrafiche

Procedura di installazione

1 - php artisan vendor:publish
(copia i files)
2 - php artisan install-cupparis-package cupparis-app-anagrafiche
(aggiorna il json generale)
3 - php artisan migrate
4 - php artisan db:seed --class=CupAnagSeeder
(popola le tabelle anagrafiche con la versione dei files in corso)

```    
php artisan vendor:publish --provider="Modules\CupAnag\Providers\CupAnagServiceProvider"
composer dump-autoload
php artisan install-cupparis-package CupAnag
php artisan module:migrate CupAnag
php artisan module:seed CupAnag
```


Procedura di disinstallazione

1 - php artisan uninstall-cupparis-package cupparis-app-anagrafiche --json
(cancella i files, aggiorna il json generale e cancella il json del pacchetto)
2 - eventualmente:
a - php artisan migrate:rollback

```    
php artisan uninstall-cupparis-package CupAnag
php artisan module:migrate-rollback 
```    
