# Storage

A storage is a data container.<br>
Its content is kept throughout the runtime.<br>
A storage must be defined at the root level of the configuration.

## Example

```yaml
source: !storage
```

## Configuration

A storage can contain already defined rows:

```yaml
source: !storage
  - title: foo
  - title: bar
```
