# Laravel tarantool replication

Replicate mysql data to tarantool and query replacted data

## Demo scenario

### Start mysql and app

```
docker compose up -d mysql
docker compose up -d app
```

### Run database migration to create replicaated table(s)

```
docker exec -it app php artisan migrate
```

### Start tarantool

```
docker compose up -d tarantool
```

### Start mysql-tarantool-replication

```
docker compose up -d replicator
```

### Seed dummy mysql data

```
docker exec -it app php artisan db:seed --class=DummySeeder
```

### Make sure created data is replicated to tarantool

Check it out via tarantool console

```
docker exec -it tarantool console
tarantool.sock> box.space.DUMMIES:select{}
---
- - [1, 'Beatae enim dolorem est et et.']
  - [2, 'Temporibus aut et voluptatem.']
...
```

Check it out via laravel query (tinker)

```
$ php artisan tinker
Psy Shell v0.10.9 (PHP 7.4.25 — cli) by Justin Hileman
>>> \App\Models\DummyReplica::all();
=> Illuminate\Database\Eloquent\Collection {#4470
     all: [
       App\Models\DummyReplica {#4464
         id: 1,
         body: "Beatae enim dolorem est et et.",
       },
       App\Models\DummyReplica {#4466
         id: 2,
         body: "Temporibus aut et voluptatem.",
       },
     ],
   }
```
