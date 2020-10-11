# Filter

Remove the rows that do not assert the expression.<br>
Check out the [HOA Ruler Documentation](https://hoa-project.net/En/Literature/Hack/Ruler.html).

## Options

#### filter (string)

The expression to assert.

#### in (string)

The identifier of the storage.

## Context

The context contains the row values.

## Example

```yaml
source: !storage
  - title: a
  - title: b

default: !task
  - filter: title = 'a'
    in: source
```
