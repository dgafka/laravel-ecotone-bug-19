# [Ecotone Bug #19](https://github.com/ecotoneframework/ecotone/issues/19)

To replicate this issue, set up the database and run:

```bash
php artisan ecotone:run dogs -vvv
php artisan dog:create
php artisan fetch:dogs
```
