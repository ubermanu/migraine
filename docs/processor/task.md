# Task

Forward current runtime to another [task](/core/task).<br>
This processor is non blocking the root task.

## Options

#### task (string)

The identifier of the task.

## Example

```yaml
default: !task
  - task: foo

foo: !task
```
