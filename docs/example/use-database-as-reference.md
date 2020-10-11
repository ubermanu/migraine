# Use database as reference

In this example, we will see how to create a reference to some reader configuration.<br>
So when we actually need it, we don't need to rewrite all the conf.

```yaml
wpdb: &wpdb
  type: database
  options:
    user: root
    database: wordpress

default: !task
  - read: wp_users
    <<: *wpdb
  - select:
      - user_login
      - user_email
  - dump:
```

> You can check [this article](https://blog.daemonl.com/2016/02/yaml.html) about anchors, references and extends.
