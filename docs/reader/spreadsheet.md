# SpreadSheet

[Reads](/processor/read) a spreadsheet file.

## Options

#### header (bool)

Does the first line contain the columns?<br>
The default value is `true`.

#### sheet (int)

The index of the current working sheet.<br>
The default value is `0`.

#### nullValue (mixed)

Value returned in the array entry if a cell doesn't exist.<br>
The default value is `null`.

#### calculateFormulas (bool)

Should formulas be calculated?<br>
The default value is `false`.

#### formatData (bool)

Should formatting be applied to cell values?<br>
The default value is `false`.

## Example

```yaml
default: !task
  - read: file.xlsx
    type: spreadsheet
```
