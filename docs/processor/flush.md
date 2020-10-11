# Flush

Empty the content of a [storage](/core/storage).

## Options

#### flush (string)

The identifier of the storage.

## Example

```yaml
source: !storage
  - title: a
  - title: b

default: !task
  - flush: source
```
