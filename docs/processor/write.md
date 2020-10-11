# Write

Output the content of a [storage](/core/storage) into a destination.<br>
A destination can be a file as well as a database table for example.

## Options

#### write (string)

The resource identifier.

#### type (string)

The type of the writer.<br>
If not defined, it will be determined using the resource identifier.

#### from (string)

The identifier of the storage.

#### options (array)

The options used by the writer.

## Types

* [CSV](/writer/csv)
* [JSON](/writer/json)
* [YAML](/writer/yaml)

## Example

```yaml
default: !task
  - write: file.csv
```
