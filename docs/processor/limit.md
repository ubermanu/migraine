# Limit

Limit a [storage](/core/storage) to a certain number of rows.

## Options

#### limit (int)

The number of rows.

#### in (string)

The identifier of the storage.

## Example

```yaml
source: !storage
  - title: a
  - title: b

default: !task
  - limit: 1
    in: source
```
