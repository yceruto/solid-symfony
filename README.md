# Refactoring Workshops

* Refactoring Legacy Applications

## Time Machine Service

Specifications:
 - Get current time (from local system by default)
 - Advance in time
 - Go back in time
 - Environment-dependent (the time cannot be modified on "prod" environment)
 - Memory (in cache by default)

Tasks:
 - Identify SOLID violations and refactor accordingly
 - Add possibility to switch to another type of persistence (without touching the code, only config)
   * Add an in-memory persistence implementation
   * Add unit tests
   * Add functional tests
