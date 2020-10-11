# CSV

[Reads](/processor/read) a CSV file.

## Options

#### header (bool)

Does the first line contain the columns?<br>
The default value is `true`.

#### delimiter (string)

The field delimiter (one character only).<br>
The default value is `,`.

#### enclosure (string)

The field enclosure character (one character only).<br>
The default value is `"`.

#### escape (string)

The field escape character (one character only).<br>
The default value is `\`.

## Example

```yaml
default: !task
  - read: file.csv
    type: csv
    options:
      header: true
      delimiter: ";"
```
