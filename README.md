
# Instalação
  - Ambiente dockerizado com o projeto laravel, database e sgdb (myadmin)

## preparatórios

  - docker compose instalado localmente
  - sail configurado
  - não há serviços rondando em 8080, 80 e 3309


### ativação do projeto e rodando migrations

 - ./vendor/bin/sail up -d
 - docker ps
 - pegar a key do container docker do projeto
 - docker exec -it 571390b9bfd5 bash (substituir pela key)
 - php artisan migrate --seed
 - está tudo pronto


```
## Autores

- [@shadowtampa](https://www.github.com/shadowtampa)

