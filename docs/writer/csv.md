# CSV

[Writes](/processor/write) a CSV file.

## Options

#### delimiter (string)

The field delimiter (one character only).<br>
The default value is `,`.

#### enclosure (string)

The field enclosure character (one character only).<br>
The default value is `"`.

#### escape (string)

The field escape character (one character only).<br>
The default value is `\`.

#### newline (string)

Sets the newline sequence.<br>
The default value is `\n`.

## Example

```yaml
default: !task
  - write: file.csv
    type: csv
    options:
      delimiter: ";"
```
