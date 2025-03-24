# Credit app
Following DDD + clean architecture

Self-written application without using third-party frameworks. My task is to show how to use the principles of ddd and clean architecture. This application has a lot of todos, because it is not for production.
## Init project
Run

```bash
./init.sh
```

## Check with CLI
Run

```bash
docker-compose exec ddd_clean_architecture_php php m0067 create-client '{"address":{"street":"street","city":"city","state":"NY","zip":"zip"},"firstName":"firstName","lastName":"lastName","age":20,"ficoScore":560,"ssn":"123-12-1234","email":"email@email.em","phoneNumber":"+1234567890", "monthlyIncome": 5000}'
docker-compose exec ddd_clean_architecture_php php m0067 make-credit-decision '{"ssn":"123-12-1234","clientEmail":"email@email.em","monthlyIncome":6000,"age":20,"state":"NV"}'
```

## Tests
Run tests

```bash
docker-compose exec ddd_clean_architecture_php php vendor/bin/phpunit tests
```
