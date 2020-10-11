# Dump

Dumps the content of a [storage](/core/storage) into the console.

## Options

#### dump (string)

The identifier of the storage.

## Example

```yaml
source: !storage
  - title: a
  - title: b

default: !task
  - dump: source
```

## Result

```
Array
(
    [0] => Array
        (
            [title] => a
        )
    [1] => Array
        (
            [title] => b
        )
)
```
