# Map

Rename columns of a [storage](/core/storage).

## Options

#### map (array)

A list of columns (as key) to rename into something else (as value).

#### in (string)

The identifier of the storage.

## Example

```yaml
source: !storage
  - title: a
  - title: b

default: !task
  - map:
      title: foo
    in: source
```
