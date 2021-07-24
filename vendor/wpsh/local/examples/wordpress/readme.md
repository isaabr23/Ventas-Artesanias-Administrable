# WordPress Development Environment

An example of a WordPress development environment created using Docker running inside Vagrant.

- `Vagrantfile` loads the Vagrant virtual environment defined in `vendor/wpsh/local/Vagrantfile`.

- `docker-compose.yaml` defines the development environment -- mounts the `plugin` directory to `/var/www/html/wp-content/plugins/plugin` inside the Docker container.

Use `vagrant up` to start the environment which will be available at `wpsh-local.local`.
