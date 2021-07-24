# Local Development Environment

[![Build Status](https://travis-ci.com/wpsh/wpsh-local.svg?branch=master)](https://travis-ci.com/wpsh/wpsh-local)

Add this to any project with `docker-compose.yaml` to run the containers inside Vagrant. Useful for creating friendly development environments with beautiful hostnames (no port numbers) that don't require Docker on the host machine.


## Requirements

- [Vagrant](https://www.vagrantup.com)
- [VirtualBox](https://www.virtualbox.org)

We suggest using [Homebrew](https://brew.sh) to install the dependencies:

	brew cask install virtualbox vagrant


## Install

1. Add this package to your project using [Composer](https://getcomposer.org):

		composer require --dev wpsh/local

2. Add `Vagrantfile` to the root of your project with the following contents:

		# Configure the hostname.
		Vagrant.configure(2) do |config|
		  config.vm.hostname = 'wpsh-local'
		end

		load File.join(
		  File.dirname(__FILE__),
		  'vendor/wpsh/local/Vagrantfile'
		)

	where `vendor/wpsh/local` is the relative path to this packge.

3. Create `docker-compose.yaml` in the root of your project to define the virtual environment.


## Examples

- See [`examples/wordpress`](examples/wordpress) for a sample WordPress development environment.
- [Block Context WordPress plugin](https://github.com/preseto/block-context).


## Development

[Travis CI](https://travis-ci.com/wpsh/wpsh-local) lints all shell scripts in `scripts/vagrant` using [shellcheck](https://www.shellcheck.net) and `Vagrantfile` (and other Ruby files) using [rubocop](https://github.com/rubocop-hq/rubocop).


## To Do

- Add support for installing via `npm`.
- Automatically create the project `Vagrantfile` on the first install.


## Credits

Created by [Kaspars Dambis](https://kaspars.net).


## License

See the LICENSE file for license rights and limitations (MIT).
