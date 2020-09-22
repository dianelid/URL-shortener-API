# URL-shortener-API

Este projeto consiste basicamente em um serviço RESTful que recebe uma URL e retorna uma versão encurtada desta URL.
O serviço também retorna informações sobre as URLs, como a URL Original, a URL encurtada, data de criação, usuário e estatística de acesso. 
Além disso, o serviço permite a criação de usuários que podem ser associados às URLs.
O usuário poderá pesquisar por todas as URLs encurtadas que ele tem, inserindo seu ID de usuário na chamada do serviço.

A API foi desenvolvida na linguagem PHP e para a persistência dos dados foi utilizado MySQL.
Para testar a chamadas à API utilizando HTTP GET e POST foi utilizado o site https://reqbin.com/.

Ao acessar uma url encurtada gerada pela API o arquivo index.php efetua o redirecionamento para o link original.

#### A API é comporta por quatro endpoints:

* *get_info*: Obtém informações de uma url específica.
  * Método HTTP: GET
  * Exemplo de chamada: http://127.0.0.1/URL-shortener-API/get_info.php?url=https://www.uol.com.br
* *get_urlByUser*: Retorna todas as urls associadas a um determinado usuário.
  * Método HTTP: GET
  * Exemplo de chamada: http://127.0.0.1/URL-shortener-API/get_urlByUser.php?id_user=1
* *post_user*: Cria um novo usuário. 
  * Método HTTP: POST
  * Exemplo de chamada: http://127.0.0.1/URL-shortener-API/post_user.php
  * Content: {"name": "Lidiane Santos"}
* *post_url*: Cria uma nova url encurtada.
  * Método HTTP: POST
  * Exemplo de chamada: http://127.0.0.1/URL-shortener-API/post_url.php
  * Content: {"url": "https://www.uol.com.br", "id_user": 1}
