# Error

Throws a configurable error.<br>
This processor stops the execution of the root [task](/core/task).

## Options

#### error (string)

The error message shown in the console.

## Example

```yaml
default: !task
  - error: 'Hello world!'
```
