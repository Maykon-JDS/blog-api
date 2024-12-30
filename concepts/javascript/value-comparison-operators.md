Aqui está um exemplo de código que demonstra as diferenças entre `==`, `===` e `Object.is()` em JavaScript, incluindo coerção de tipos e as peculiaridades envolvendo `NaN` e `+0`/`-0`:

```javascript
// Diferença entre ==, === e Object.is()

// Coerção de tipo com ==
console.log("5" == 5);   // true (coerção automática para o mesmo tipo)
console.log(false == 0); // true (coerção converte false para 0)

// Comparação estrita com ===
console.log("5" === 5);   // false (tipos diferentes, sem coerção)
console.log(false === 0); // false (tipos diferentes, sem coerção)

// Comparação com Object.is()
console.log(Object.is("5", 5));   // false (tipos diferentes, sem coerção)
console.log(Object.is(false, 0)); // false (tipos diferentes, sem coerção)

// Casos especiais: +0, -0 e NaN
console.log(0 === -0);            // true (são tratados como iguais)
console.log(Object.is(0, -0));    // false (distingue +0 de -0)

console.log(NaN === NaN);         // false (NaN não é igual a si mesmo com ===)
console.log(Object.is(NaN, NaN)); // true (NaN é tratado como igual a si mesmo)

// Coerção pode levar a resultados inesperados
console.log("" == false);         // true (coerção converte ambos para 0)
console.log(Object.is("", false)); // false (sem coerção, valores e tipos diferentes)

// Use o operador certo para o caso adequado
const value1 = "10";
const value2 = 10;

// Escolha consciente:
console.log(value1 == value2);    // true (coerção automática)
console.log(value1 === value2);   // false (comparação estrita)
console.log(Object.is(value1, value2)); // false (sem coerção)
```

### Explicação:
1. **`==`** realiza coerção de tipos, tentando converter os operandos para o mesmo tipo antes de compará-los. Isso pode levar a resultados inesperados, como `"" == false` retornando `true`.

2. **`===`** é uma comparação estrita: compara valores e tipos diretamente, sem coerção.

3. **`Object.is()`**:
   - Não realiza coerção de tipos.
   - Trata `NaN` como igual a si mesmo.
   - Distingue entre `+0` e `-0`.

Esse código ilustra como as diferenças entre os operadores de comparação podem influenciar os resultados, especialmente em casos onde coerções automáticas ocorrem com `==`.