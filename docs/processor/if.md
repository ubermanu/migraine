# If

Analyzes an expression and executes the defined task.<br>
Check out the [HOA Ruler Documentation](https://hoa-project.net/En/Literature/Hack/Ruler.html).

## Options

#### if (string)

The expression to assert.

#### then (string)

The identifier of the task, if the the expression asserts *true*.

#### else (string)

The identifier of the task, if the the expression asserts *false*.

## Context

#### storage (StorageInterface)

Access the current default storage.

## Example

```yaml
default: !task
  - if: 1 = 1
    then : foo

foo: !task
```
