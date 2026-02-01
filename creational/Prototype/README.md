## Prototype
The prototype pattern is useful for adding a commonly 
understood/conventional clone capability to entities in your 
application. Implementing a clone method in this way allows you to 
build rich cloning functionality, useful for complex entities. Creating
a new instance using prototype can also save you memory over 
hydrating the details from elsewhere (e.g. a database call) especially
when used with a registry.

## Pros
- Allows you to properly clone all properties of a class (including private/protected)
- Establishes a predictable convention
- Avoids expensive object construction when creating variations
- Preserves the original object while letting you customise clones

## Cons
- Requires careful implementation/understanding to get deep copying right
- Can be overkill, sometimes `new MyClass()` is good enough
- Complicated if objects contain circular references or external resources (e.g. database connections)

## Common Use Cases
- Documents/templates that need customisations
- Configuration objects with many default settings
- Form/UI component templates with standard configurations

## When To Use
- Complex classes that need to be customised without affecting the original
- There are established "templates" of classes that regularly need small customisations
- Pre-configured "template" starting point objects
- Creating many similar objects without repeating complex setup logic