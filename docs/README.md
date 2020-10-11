# Introduction to Migraine

Migraine is a task runner oriented on data processing.<br>
It's a tool to migrate and transform data sources into a certain destination.

## Install

    $ composer global require ubermanu/migraine:dev-master

## Quick start

Migraine uses yaml for its configuration file.<br>
Create a `migraine.yml` file, that will transform a csv file into a json one:

```yaml
default: !task
    - read: file.csv
    - write: file.json
```

To execute this task, run:

    $ migraine

## Going Further

* Create a [task](/core/task)
* Add a [processor](/core/processor) to the task
* Add a storage [storage](/core/storage)
