# Assert

Validating data and throwing exceptions is a great way to make your code more robust. It comes in handy especially in
domain logic objects like Actions or Commands.

### Why another assertion library

There are two great and very used PHP assertion libraries:

- [beberlei/assert]
- [webmozart/assert]

What we hope to achive with this implementation is to provide:

- chained assertions (we really like the Pest expectations approach)
- a fluent way to provide optional arguments (messages, code etc.)
- provide custom exception classes

## Usage

```php
Assert::that($var)
    ->isNumeric()
    ->equals(5)
    ->orFail("Not Numeric")
    ->throw(MyCustomException::class);
```

#### Inspiration

* https://github.com/webmozarts/assert
* https://github.com/beberlei/assert
* https://github.com/Respect/Assertion
* https://bitbucket.org/nunzion/php-expect/src/master/
