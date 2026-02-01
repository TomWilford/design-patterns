## Abstract Factory
Abstract factories expands on the factory pattern by allowing you to
rely on multiple factories that create related objects. Using an 
abstract factory is a neat way to compose multiple step operations 
for a variety of related but distinct entities.

A good example use case (seen in the practical example) that
illustrates this is a site that offers multiple payment gateways. 
Each gateway will have a series of similar steps (e.g. authentication, 
request, callback) that need to be executed at the same points, but
the actual implementations will vary depending on the provider. At
runtime these operations will need to happen according to the gateway
the user has selected.

## Pros
- Allows neat composition of code in consuming classes
- Helps enforce SRP with granular classes for a family of operations
- Avoids tight coupling
- Allows open/closed principle as new factories can always be added 
  instead of modifying existing ones

## Cons
- Doesn't work well with classes that have varying dependencies
- Code can appear more complicated through introducing lots of 
  interfaces

## Common Use Cases
- Payment gateways 
- UI themes
- Cross-platform apps
- Database connections
- Document generation

## When To Use
- When working with lots of related classes, but you don't want to
  depend on the concrete implementations
