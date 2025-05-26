# Singleton
Singleton is used when you want **only one instance** of something 
throughout the entire lifecycle of the application. Instead of creating
multiple objects, **all calls** to the class will **share the same 
instance**. 

## Pros
- Prevents critical components (e.g. database) from being duplicated
- Makes sure only one object manages a shared system resource
  - Preventing race conditions or unintentional modifications
- Memory usage is reduced as the same instance is used for all interactions

## Cons
- Can create tight coupling that reduces
  modularity in an application
- Singletons introduce global state which can be harder to test and
may interfere with other tests
- It can be easy to overuse Singletons where of DI or factories would
be cleaner

## Common Use Cases
- Database Connection Management
- Logging Services
- Application Configuration
- Event Dispatchers
- Network Sessions/Cache Management

## When To Use
- A single instance is absolutely needed to manage a resource
- Shared state is required globally and immutably
- Performance matters