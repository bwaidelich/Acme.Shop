Setup
=====

Install Flow base distribution:
```
composer create-project --dev --keep-vcs typo3/flow-base-distribution workshop
```

Add phpunit (not required in recent version):
```
composer require "phpunit/phpunit:3.7.*@stable" --dev
```

Fix file permissions:
```
./flow flow:core:setfilepermissions <commandline user> <webserver user> <webserver group>
```

(for example ``./flow flow:core:setfilepermissions user _www _www``)

Setup (virtual) server (or use [dnsmasq])

Kickstart
=========

Kickstart package:
```
./flow kickstart:package Acme.Shop
```

Kicktart model:
```
./flow kickstart:model Acme.Shop Product "name:string" "price:float"
./flow kickstart:model Acme.Shop PurchaseItem "product:Product" "amount:integer"
./flow kickstart:model Acme.Shop Purchase "items:\Doctrine\Common\Collections\Collection<PurchaseItem>"
```
...

Manually adjust model

...

Validate model:

```
./flow doctrine:validate
```

Add unit tests...

Kickstart controller:

```
./flow kickstart:actioncontroller Acme.Shop Product --generate-related
```

Add repositories ...

Migration
=========
```
./flow doctrine:migrate
./flow doctrine:migrationgenerate
```
(setup database credentials?)

Some dummy data
===============
```
./flow kickstart:commandcontroller Acme.Shop Products
```

[dnsmasq]:https://gist.github.com/robertlemke/4951820