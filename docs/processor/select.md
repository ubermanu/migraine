# Select

Select a set of columns of a [storage](/core/storage), and remove the others.

## Options

#### select (array)

A list of columns to keep.

#### in (string)

The identifier of the storage.

## Example

```yaml
source: !storage
  - title: a
    foo: bar
  - title: b
    foo: bar2

default: !task
  - select:
      - title
    in: source
```
