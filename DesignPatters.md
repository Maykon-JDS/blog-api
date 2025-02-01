
<!-- TODO: Ajustar o conteúdo -->

# 🏗️ Padrões de Projeto GoF no Meu Projeto

Este projeto implementa alguns padrões de design da **Gang of Four (GoF)** para garantir um código mais modular, reutilizável e de fácil manutenção.

## 📌 Padrões Implementados

### 1️⃣ Singleton
**Propósito:** Garante que uma classe tenha apenas uma instância global e fornece um ponto de acesso único para ela.
**Localização:** [`app/Services/SingletonExample.php`](./app/Services/SingletonExample.php)
**Exemplo de Uso:**
```php
$instance = SingletonExample::getInstance();
$instance->doSomething();
```

---

### 2️⃣ Adapter
**Propósito:** Permite que classes com interfaces incompatíveis trabalhem juntas ao criar um adaptador que faz a conversão entre elas.
**Localização:** [`app/Adapters/`](./app/Adapters/)
**Exemplo de Uso:**
```php
$legacyService = new LegacyService();
$adapter = new ServiceAdapter($legacyService);
$adapter->newMethod();
```

---

### 3️⃣ Chain of Responsibility
**Propósito:** Permite que uma solicitação percorra uma cadeia de manipuladores até encontrar aquele que pode processá-la.
**Localização:** [`app/Handlers/`](./app/Handlers/)
**Exemplo de Uso:**
```php
$handler1 = new ConcreteHandler1();
$handler2 = new ConcreteHandler2();
$handler1->setNext($handler2);

$request = new Request();
$handler1->handle($request);
```

---

## 🚀 Como Rodar o Projeto
1. Clone o repositório:
   ```sh
   git clone https://github.com/seu-usuario/seu-repositorio.git
   ```
2. Instale as dependências:
   ```sh
   composer install
   ```
3. Execute os testes:
   ```sh
   ./vendor/bin/phpunit
   ```

## 📖 Referências
- [Design Patterns - GoF](https://refactoring.guru/design-patterns)
- [PHP Design Patterns](https://designpatternsphp.readthedocs.io/)

---

Caso tenha alguma dúvida ou sugestão, fique à vontade para abrir uma issue! 😊🚀
```

---

### 📌 Explicação dessa estrutura:
✔️ **Cada padrão tem uma explicação curta e um exemplo de código**
✔️ **Os caminhos dos arquivos são sugeridos com links relativos**
✔️ **Adiciona instruções para rodar o projeto**
✔️ **Inclui referências úteis sobre padrões de projeto**

Se quiser personalizar mais alguma coisa, me avise! 🚀