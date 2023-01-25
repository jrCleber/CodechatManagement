# CodechatManagement


<h4 align="center"> 
	🚧 SISTEMA FEITO EM PHP E NODE PARA GERENCIAMENTO DE SESSÕES WHATSAPP, APLICAÇÕES e Integração ao Chatwoot 🚀 Em construção...  🚧
</h4>

## Descrição do Projeto
<p align="center">Implementação que facilita o gerenciamento de sessões, servidores, e aplicações, utilizando o CodeCHAT baseado no Baileys, Permitindo o gerenciamento de sessões, usuarios, futuramente chats e possível implementação de chatBOT com dialogFlow por exemplo</p>

### CRÉDITOS/AGRADECIMENTOS

- Cleber Dev do Codechat :) https://github.com/code-chat-br/whatsapp-api
- ....

### Em Construção

- [x] Configurações Iniciais [27/02/2022];
- [x] Adição de Sessões e Pareamento;
- [x] Criação de usuários
- [ ] Permissão de usuários e API para uso externo via método GET ou direto do navegador
- [ ] Envio de Mensagens (API EXTERNA)
- [ ] Envio de áudio, arquivo, imagem (API EXTERNA)
- [ ] Envio de link (API EXTERNA)
- [ ] Envio de localização GPS (API EXTERNA)
- [ ] Envio de sticks (API EXTERNA)
- [ ] Envio de Botões (API EXTERNA)
- [ ] Adição de usuários e APIs para acesso externo
- [x] Acesso a API externo
- [x] Token e Sessão salva para acesso via POST
- [x] Chamadas Restfull
- [x] Integração com o Chatwoot "Texto, Audio,Video, Image, Documento 100%!


### Pré-requisitos

O Sistema foi testado tanto em Linux como Windows Tanto funciona no APACHE como NGINX <br>
É Obrigatório a versão do PHP ser 8.0> Pois funções foram escritas na nova versão do PHP, Impossibilitando versão anteriores a 8.0 :) <br>
é necessário o PHP ter as extensões mbstring, openssl ou mcrypt, intl. <br>
o Banco de dados está escrito em MySQL 8, caso queira usar o Maria DB ou MySQL 5 ~~ 6, só alterar o COLLATE do mesmo e importar o banco!
<br>
É NECESSÁRIO O COMPOSER!
### 🎲 Edite o arquivo /config/bootstrap.php No final do arquivo!
```bash
Configure::write('chatwoot', [
    'api' => 'axcSJMJFDjdoi9980890jJD', | Altere aqui para a API geral do Chatwoot ou seja a Platform API
    'url' => 'https://chatwoot.local' | Altere aqui para a URL do seu chatwoot, lembre-se de por o http* no começo e NÃO coloque / no final!
]);
Configure::write('this', [
    'url' => 'http://madcrowlyn.tk' | Altere aqui para a URL de onde está este sistema, lembre-se de por o http* no começo e NÃO coloque o / final!
]);
Configure::write('registro', [  | altere aqui caso queira que o registro fique ativo para qualquer 1;
    'register' => 'off'
]);
```
### 🎲  Edite o arquivo /config/app_local.php
```bash
# Procure por  'Datasources' => [
        'default' => [
e edite o HOST com o servidor MySQL, username password e db!, Mesma coisa com o debug_kit! Mais abaixo, 
caso queira ativar o envio de Email só editar conforme!
```

é possivel editar o arquivo Users.php caso queira ativar ativação do cadastro por email por exemplo...

Importe o banco de dados no MySQL;
Va para config/app_local.php

Procure por "'Datasources' => ["

altere o host para o Endereço do MySQL
username, password, database
Salve o arquivo!

o acesso padrão é gerado com o comando CMD na pasta RAIZ do projeot:
bin/cake users addSuperuser

só anotar o user e password, dentro do sistema para alterar a senha vá em /profile.

Mais informações sobre o sistema de usuários pode ser encontrado aqui!

https://github.com/CakeDC/users/blob/11.next-cake4/Docs/Home.md
inclusive, pode ser habilitado até login com redes sociais e afins, bem completinho :)

# Pronto, só correr para o abraço

#Olá :)

### Autor
---

<a href="https://mdbr.tech/">
 <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/21254630?v=4" width="100px;" alt=""/>
 <br />
 <sub><b>Marcos Antonio ou Tonhão</b></sub></a> <a href="https://mdbr.tech" title="Voialá">🚀</a>


Feito com ❤️ por SirTonhão 👋🏽 Entre em contato!

[![Linkedin Badge](https://img.shields.io/badge/-Tony-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/marcosasneves/)](https://www.linkedin.com/in/marcosasneves/) 
[![Hotmail Badge](https://img.shields.io/badge/-otherside540n@hotmail.com-c14438?style=flat-square&logo=Hotmail&logoColor=white&link=mailto:otherside540n@hotmail.com)](mailto:otherside540n@hotmail.com)
