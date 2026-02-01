## Factory
Factories provide a great way to respect the open/closed principle by 
replacing the need to use `new` when instantiating a product, with an
interfaced method. The factory still instantiates the class to produce,
it just means consuming classes can use factories that achieve the same 
outcome in different ways. 

For example, a consuming class that notifies an end user depending on 
their settings (e.g. email or sms) will benefit from a factory. 
Dependency injection can serve the correct factory for the user's
preferred notification style to the consuming class, allowing the 
rest of the code to be composed agnostic of the various concrete 
implementations for sending notifications.

## Pros
- Avoids tight coupling between the consuming class and various
  related but different concrete implementations
- Encourages you to use SRP
- Helps you respect open/closed principle and make life easier for 
  future you

## Cons
- Code can seem more complicated at first as you introduce interfaces

## Common Use Cases
- Notification systems
- Logging (e.g. to a file or a database)
- Data parsing (e.g. parsing json or xml)
- Report generators

## When To Use
- When object creation logic is complex or conditional
- When you want to decouple instantiation from usage
- When you have multiple related classes that share an interface
- When creation parameters might change frequently