# 💰 Wallet Module — Casino Virtual

Sistema de fichas virtuales con equivalencia **1 Ficha = $0.10 MXN**.
Todo el saldo se almacena en **centavos de ficha** (integers) para evitar errores de punto flotante.

---

## 📁 Estructura de Archivos

```
wallet/
├── wallet.module.ts                         # Registro NestJS del módulo
│
├── domain/                                  # Reglas de negocio puras (sin frameworks)
│   ├── wallet.entity.ts                     # Entidad Wallet: debit/credit/validaciones
│   ├── transaction.entity.ts                # Entidad Transaction: el Ledger
│   ├── chip-value.vo.ts                     # Value Object: conversión MXN ↔ Fichas
│   └── wallet.repository.interface.ts       # Puertos: IWalletRepo, ITransactionRepo, IUoW
│
├── application/                             # Casos de uso (orquestación)
│   ├── deposit-chips.use-case.ts            # Stripe confirma pago → acreditar fichas
│   ├── process-bet.use-case.ts              # Cobrar apuesta antes del juego
│   ├── credit-winner.use-case.ts            # Acreditar premio + Reembolso por error
│   └── get-balance.service.ts              # Consultar saldo + historial de transacciones
│
└── infrastructure/                          # Adaptadores (BD, HTTP, WebSockets)
    ├── wallet.controller.ts                 # GET /wallet/balance, GET /wallet/transactions
    ├── wallet.repository.ts                 # TypeORM: WalletRepo, TransactionRepo, UoW
    ├── wallet.gateway.ts                    # WebSocket: notificaciones en tiempo real
    └── entities/
        └── wallet.orm-entity.ts             # Tablas TypeORM: wallets + transactions
```

---

## 🎰 Sistema de Fichas

| Concepto          | Valor           | Ejemplo                          |
|-------------------|-----------------|----------------------------------|
| 1 Ficha           | $0.10 MXN       | 100 fichas = $10 MXN             |
| Mínimo de apuesta |      > 0        | configurable en módulo Juegos    |

### Paquetes disponibles

| Paquete     | Precio MXN | Fichas  | 
|-------------|------------|---------|
| pack_100    | $10        | 100     | 
| pack_500    | $50        | 500     | 
| pack_1000   | $100       | 1,000   |
| pack_5000   | $500       | 5,000   | 

---

## 🔄 Flujos Principales

### Compra de Fichas (Stripe)
```
Frontend crea PaymentIntent con metadata: { userId, packageId }
    ↓
Stripe procesa el pago
    ↓
POST /webhooks/stripe  →  DepositChipsUseCase
    ↓
Wallet.credit(fichas)  →  BD actualizada (ACID)
    ↓
WalletGateway emite 'wallet:balance_updated' por WebSocket
```

### Apuesta
```
Módulo Juegos llama ProcessBetUseCase.execute({ userId, betInChips, gameRoundId })
    ↓
Wallet.debit(fichas)  ← lanza InsufficientFundsError si no alcanza
    ↓
Juego ejecuta la ronda
    ↓
Si gana: CreditWinnerUseCase
Si error del sistema: RefundBetUseCase
```

---

## 🔌 Cómo lo usa el módulo de Juegos

```typescript
// En juegos.module.ts
imports: [WalletModule]

// En tu game.service.ts
constructor(
  private readonly processBet: ProcessBetUseCase,
  private readonly creditWinner: CreditWinnerUseCase,
  private readonly refundBet: RefundBetUseCase,
) {}

async playRound(userId: string, bet: number, roundId: string) {
  // 1. Cobrar apuesta
  await this.processBet.execute({ userId, betInChips: bet, gameRoundId: roundId, gameName: 'Ruleta' });

  // 2. Ejecutar lógica del juego...
  const prize = this.calculatePrize(bet);

  // 3. Si ganó
  if (prize > 0) {
    await this.creditWinner.execute({ userId, prizeInChips: prize, gameRoundId: roundId, gameName: 'Ruleta' });
  }
}
```

---

## 🛡️ Garantías del Sistema

- **ACID**: Cada operación de saldo + registro de transacción ocurre en una sola transacción de BD.
- **Idempotencia**: Si Stripe envía el mismo webhook dos veces, las fichas se acreditan una sola vez.
- **Auditoría completa**: Cada centavo de ficha tiene un registro con quién, cuándo y por qué cambió.
