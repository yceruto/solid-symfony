# Refactoring Workshop

* SOLID Principles on Symfony applications

## Clock

Specifications:
 - If it doesn't exist, the default time is the current system time
 - It can advance to a future date/time
 - It can reset to the current time
 - It cannot be modified on "prod" environment and always returns the current time
 - It is persisted on cache system (by default)

Tasks:
 - Identify SOLID violations and refactor accordingly
 - Add possibility to switch to another type of persistence (without touching the code, only config)
   * Add an in-memory persistence implementation
   * Add unit tests (use the previous in-memory adapter)
   * Add functional tests (use the previous in-memory adapter)
