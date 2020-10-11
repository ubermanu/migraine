# Processor

A processor is a callable that will execute stuff.<br>
Within a task, its type is defined by the first key of the processor configuration.

## Example

In this example, `read` is the processor type.

```yaml
default: !task
  - read: file.csv
    type: csv
```

## Configuration

To implement or overwrite a processor class:<br>
In this example, `xml` is the processor type.<br>
When the parser will search for a matching class, it will look up here first.

```yaml
migraine:
  processors:
    xml: Vendor\Package\Processor\XmlProcessor
```
