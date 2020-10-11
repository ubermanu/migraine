# Read

Include the content of a source into a [storage](/core/storage).<br>
A source can be a file as well as a database table for example.

## Options

#### read (string)

The resource identifier.

#### type (string)

The type of the reader.<br>
If not defined, it will be determined using the resource identifier.

#### to (string)

The identifier of the storage.

#### options (array)

The options used by the reader.

## Types

* [CSV](/reader/csv)
* [Database](/reader/database)
* [JSON](/reader/json)
* [SpreadSheet](/reader/spreadsheet)
* [YAML](/reader/yaml)

## Example

```yaml
default: !task
  - read: file.csv
```
