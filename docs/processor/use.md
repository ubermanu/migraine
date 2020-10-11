# Use

Set the default [storage](/core/storage) identifier.<br>
This allows you to not specify any storage identifier in the following processors.

## Options

#### use (string)

The identifier of the storage.

## Example

```yaml
source: !storage
  - title: a
  - title: b

default: !task
  - use: source
```
