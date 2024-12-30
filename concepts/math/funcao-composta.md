# Função Composta

A **função composta** é uma maneira de conectar duas ou mais funções, de modo que a saída de uma função se torna a entrada de outra. No exemplo dado, temos duas funções: uma que calcula a quantidade de milho produzida com base no número de acres plantados, e outra que calcula o dinheiro que Caio ganhará com a quantidade de milho produzida. Vamos detalhar esse processo.

## Passo 1: Definindo as funções

1. **Função $ (C(a)) $ **: Esta função descreve a quantidade de milho $ ((C)) $ que Caio espera produzir, dado que ele planta $(a)$ acres de terra. A fórmula é:

   $$
   C(a) = 7{.}500a - 1{.}500
   $$

   Onde:
   - $(a)$ é o número de acres plantados.
   - $(C(a))$ é a quantidade de milho produzida em quilogramas (kg).

2. **Função $(M(c))$**: Esta função descreve o dinheiro ($(M)$) que Caio ganhará ao vender $(c)$ quilogramas de milho. A fórmula é:

   $$
   M(c) = 0{,}9c - 50
   $$

   Onde:
   - $(c)$ é a quantidade de milho em quilogramas.
   - $(M(c))$ é a quantidade de dinheiro que Caio ganhará.

## Passo 2: Composição das funções

A ideia da **função composta** é unir essas duas funções em uma única fórmula, que converte diretamente o número de acres plantados $(a)$ em ganhos esperados $(M(C(a)))$. Para isso, vamos substituir a expressão $(C(a))$ na função $(M)$.

1. **Substituindo $(C(a))$ em $(M(c))$**:

   Sabemos que $(C(a) = 7{.}500a - 1{.}500)$. Agora, substituímos isso na função $(M(c))$:

   $$
   M(C(a)) = M(7{.}500a - 1{.}500)
   $$

2. **Aplicando a fórmula de $(M(c))$**:

   Lembre-se de que a fórmula para $(M(c))$ é $(M(c) = 0{,}9c - 50)$. Substituímos $(c)$ por $(C(a))$:

   $$
   M(C(a)) = 0{,}9(7{.}500a - 1{.}500) - 50
   $$

3. **Simplificando a expressão**:

   $$
   M(C(a)) = 0{,}9 \times 7{.}500a - 0{,}9 \times 1{.}500 - 50
   $$
   $$
   M(C(a)) = 6{.}750a - 1{.}350 - 50
   $$
   $$
   M(C(a)) = 6{.}750a - 1{.}400
   $$

Assim, a **função composta** que converte diretamente acres plantados $(a)$ em ganhos esperados $(M(C(a)))$ é:

$$
M(C(a)) = 6{.}750a - 1{.}400
$$

## Passo 3: Aplicando a função composta

Agora, para calcular os ganhos diretamente a partir de $(a)$ acres, basta substituir $(a)$ na função composta $(M(C(a)))$.

Por exemplo, se Caio planta **2 acres**:

$$
M(C(2)) = 6{.}750(2) - 1{.}400 = 13{.}500 - 1{.}400 = 12{.}100
$$

Portanto, Caio espera ganhar **R\$12.100** ao plantar 2 acres de milho.

## Conclusão

A **função composta** $(M(C(a)) = 6{.}750a - 1{.}400)$ permite que Caio calcule diretamente seus ganhos esperados, sem a necessidade de primeiro calcular a quantidade de milho produzida e depois calcular o dinheiro obtido com a venda do milho. Isso simplifica o processo e torna as previsões mais diretas.
