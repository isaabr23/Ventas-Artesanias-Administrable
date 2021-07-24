#!/usr/bin/env bash

set -e

# Map binary name to source URL.
REPOS=(
	"docker-compose,https://github.com/docker/compose/releases/download/1.24.0/docker-compose-$(uname -s)-$(uname -m)"
)

# Add the Docker repo.
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"

apt-get install -y software-properties-common

apt-get update

apt-get install -y \
	docker-ce avahi-daemon

# Install various binary scripts.
for repo_set in "${REPOS[@]}"; do
	while IFS=',' read -ra repo; do
		dest_path="/usr/local/bin/${repo[0]}"

		if [ ! -f "$dest_path" ]; then
			echo "Installing ${repo[1]} to $dest_path"

			curl -sL "${repo[1]}" -o "$dest_path"
			chmod +x "$dest_path"
		fi
	done <<< "$repo_set"
done

# Add user vagrant to the docker group to avoid needing sudo.
usermod -a -G docker vagrant
