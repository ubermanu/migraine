# Database

[Reads](/processor/read) a database table.

## Options

#### driver (string)

The database driver to use, see [PDO](http://php.net/manual/fr/pdo.drivers.php).<br>
The default value is `mysql`.

#### host (string)

The host server name.<br>
The default value is `localhost`.

#### port (string)

The port of the database service on the host.<br>
The default value is `3306`.

#### username (string)

The name of the user account.<br>
The default value is `root`.

#### password (string)

The password of the user account.

#### database (string)

The name of the database.

#### charset (string)

The charset of the database.<br>
The default value is `UTF8`.

## Example

```yaml
default: !task
  - read: logs
    type: database
    options:
      database: db
      user: admin
```
