# Portal de Cadastros - Martini Meat

> **Um pouco de história:** Este foi um dos meus primeiros sistemas desenvolvidos "do zero". Assim como os criadores do Google começaram de forma simples com as ferramentas que dominavam na época, eu utilizei os conhecimentos que tinha em PHP nativo e MySQL para solucionar um problema real e crítico de negócio.
> 
> O sistema nasceu entre 2014 e 2015 para dar suporte direto ao **Projeto Camboa** (implementação do sistema SAP) na **Martini Meat**, operando ativamente antes e após o *GoLive*. O objetivo principal era apoiar a área de Processos e Cadastros, garantindo que o trâmite de solicitações fosse intuitivo, automatizado e que os **Dados Mestres** fossem perfeitamente saneados para alimentar toda a complexa estrutura do SAP. O impacto prático do sistema superou as expectativas, otimizando o tempo da equipe e recebendo reconhecimento direto da gerência do projeto pela entrega de alto valor agregado.
> 
> ⚠️ **Aviso de Portfólio / Direitos:** A Martini Meat S.A. foi oficialmente adquirida pela multinacional *Emergent Cold LatAm* no final de 2021, o que significa que a empresa original não existe mais em sua forma independente. Como esta estrutura corporativa e tecnológica da época foi dissolvida, este código-fonte legado pode ser baixado, rodado e avaliado livremente como peça de portfólio, sem riscos de expor segredos ou infringir direitos de propriedade de uma operação atual.

---

Este repositório contém o código original preservado, porém **recentemente modernizado** em sua interface de usuário. 

O sistema foi revitalizado com padrões de design modernos (efeitos de Glassmorphism, design responsivo, modais flexíveis e painéis redesenhados), provando que é perfeitamente possível manter a estabilidade e a lógica de um backend legado em harmonia com uma experiência de usuário (UX) de ponta.

Devido à obsolescência das funções de acesso a banco de dados clássicas do PHP (como `mysql_connect`), este projeto está configurado para rodar em containers Docker, emulando com precisão o servidor original (PHP 5.6) sem a necessidade de refatorar a base de dados.

---

## 🌟 Novidades da Versão Atual
- **UI/UX Modernizada:** Tela de login totalmente nova utilizando efeitos de Glassmorphism (vidro fosco) e design limpo.
- **Painel Administrativo Elegante:** Barra lateral (sidebar) responsiva, modais limpas com flexbox e avatares alinhados.
- **Experiência Dinâmica:** Saudação de boas-vindas contextual baseada na hora do dia.
- **Auto-Configuração do 1º Administrador:** O primeiro usuário cadastrado no sistema herda privilégios máximos automaticamente.

---

## 📂 Estrutura de Pastas

* `/src/` — Contém todo o código da aplicação PHP (antigo `public_html`).
* `/database/` — Contém o dump SQL (`init.sql`) para inicialização automática no banco de dados.
* `/docs/` — Documentação e manuais originais do portal.
* `/Dockerfile` — Configuração para build da imagem PHP 5.6 + Apache + extensões clássicas do MySQL.
* `/docker-compose.yml` — Definição dos containers de servidor web e banco de dados.

---

## 🛠️ Pré-requisitos

1. **Docker Desktop** instalado e em execução na máquina Windows.
2. Certifique-se de que as portas **8080** (Web) e **3306** (MySQL) não estão em uso por outras aplicações na sua máquina (ex: IIS, Apache local, MySQL Server local).

---

## 🚀 Como Iniciar o Ambiente

1. Abra o terminal (PowerShell ou Command Prompt) na raiz deste projeto.
2. Execute o comando para construir a imagem e iniciar os containers em segundo plano:
   ```bash
   docker compose up --build -d
   ```
3. Aguarde alguns instantes até que o MySQL seja totalmente inicializado e termine de importar o arquivo `database/init.sql` (pode demorar alguns segundos na primeira execução).

---

## 🔗 Acessando a Aplicação

Abra o seu navegador e acesse:
👉 **[http://localhost:8080/login.php](http://localhost:8080/login.php)**

### 👑 Como Criar o Primeiro Usuário (Administrador)
Como o banco de dados é inicializado totalmente vazio por motivos de privacidade e segurança, você precisa registrar o primeiro acesso.

**Método 1: Pela Interface Gráfica (Recomendado)**
Acesse a página de Login e clique na aba **"Criar Conta"**. Como você é a primeira pessoa a se registrar, o sistema foi programado para detectar que o banco está vazio e **te conceder automaticamente o nível de Administrador (Nível 2)**.

**Método 2: Manualmente (Na Unha via SQL)**
Caso prefira inserir direto pelo banco de dados ou automatizar o processo, conecte-se ao MySQL na porta `3306` (usando ferramentas como DBeaver, HeidiSQL ou phpMyAdmin) e rode a query abaixo:
```sql
INSERT INTO user (nome, login, senha, email, nivel) 
VALUES ('Administrador', 'admin', 'sua_senha_aqui', 'admin@dominio.com', '2');
```
*O `nivel = '2'` é o que define que esta conta possui todos os privilégios.*

---

## 🔍 Comandos Úteis

### Visualizar Logs
Para acompanhar a inicialização ou depurar erros no portal:
* **Todos os logs:** `docker compose logs -f`
* **Logs apenas do banco:** `docker compose logs -f db`
* **Logs do portal web (PHP/Apache):** `docker compose logs -f web`

### Parar o Ambiente
Para parar os containers sem perder os dados salvos no banco de dados:
```bash
docker compose stop
```

Para remover os containers e liberar as portas:
```bash
docker compose down
```

Caso queira redefinir o banco de dados completamente (importar o `init.sql` novamente do zero):
```bash
docker compose down -v
```
*(O parâmetro `-v` remove o volume persistente do banco, forçando a importação limpa na próxima inicialização)*
