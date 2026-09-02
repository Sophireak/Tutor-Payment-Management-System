#!/usr/bin/env bash

# Convenience wrapper around Laravel Sail.
#
# Run `./sail up -d` from the project root. It simply forwards every command
# to the real Sail script inside the vendor directory, which is installed by
# Composer (`composer require laravel/sail --dev`).
#
# You can also use `./vendor/bin/sail` directly — both do the same thing.

if [ ! -f "vendor/bin/sail" ]; then
    echo "Sail is not installed yet." >&2
    echo "Run: composer install" >&2
    exit 1
fi

exec "vendor/bin/sail" "$@"
