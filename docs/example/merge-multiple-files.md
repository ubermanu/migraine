# Merge multiple files

When working with multiple sources, the equivalent amount of storage is needed.<br>
A storage acts like temporary memory.

```yaml
storage2: !storage
storage3: !storage

default: !task
  - read: file1.json
  - read: file2.json
    to: storage2
  - read: file3.json
    to: storage3
  - merge:
      - storage2
      - storage3
  - dump:
```

> There is always a default empty storage automatically created at first.<br>
This is why there is no "storage1" declared.
