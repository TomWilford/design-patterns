# Builder
The Builder pattern is a creational design pattern 
that allows you to construct complex objects step 
by step. It separates the construction logic of a 
complex object from its representation. Instead of 
a single, complex constructor with many arguments, 
you use a dedicated builder class with a series of 
methods to configure the object incrementally. 
This results in more readable and maintainable code.

The pattern works by delegating the object-creation 
process to a builder object. A separate director 
class can optionally be used to orchestrate the 
builder in a specific sequence, allowing the same 
construction process to produce different representations 
or variations of a product.

## Pros
- **Avoids "Telescoping Constructors"**: Prevents the need 
for a long, confusing list of constructors with different 
parameter combinations, which can be hard to maintain 
and use.

- **Improved Readability**: The step-by-step construction 
through clearly named methods makes the code easier to
read and understand.

- **Controlled Construction**: The builder's build() method
can perform final validation to ensure the constructed 
object is in a valid state before it is returned.

- **Enables Immutability**: The product object can be made
immutable by using a private constructor and ensuring 
all properties are set during the build process, 
preventing unwanted changes after creation.

- **Separation of Concerns**: It isolates the complex 
object creation logic into its own class, keeping the 
product class and the client code clean.

## Cons
- **Increased Code Complexity**: The pattern requires 
creating additional classes (the builder, and optionally 
a director and interfaces), which can be overkill for 
simple objects.

- **Boilerplate**: It can introduce a significant amount of 
boilerplate code, especially for objects with many 
properties, as each property needs a corresponding 
method in the builder.

## Common Use Cases
- **Building Complex API Queries**: Constructing a query 
string with many optional parameters (e.g. filters, 
pagination, sorting).

- **Creating User Interface Components**: Assembling UI 
elements like dialog boxes or forms where components 
(buttons, text fields, etc.) and their properties 
are added step-by-step.

- **Building Complex Data Transfer Objects**: When a DTO
needs to be created with many optional fields, especially 
for APIs or data-heavy applications.

- **Generating Reports**: Creating different types of 
reports (HTML, PDF, CSV) by using a single director with 
different concrete builders.

## When To Use
- When an object has a large number of optional or required 
properties that would result in a complex and confusing 
constructor.

- When you want to produce different representations of a 
product using the same construction process.

- When you need to create an object in multiple stages or
with varying configurations.

- When you need to enforce a specific order or validation 
during the object's construction.