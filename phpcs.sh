#!/bin/bash
# Make sure this file is executable
# chmod +x phpcs.sh

if [ `echo "$@" | grep '\-\-fix'` ] || [ `echo "$@" | grep '\-f'` ]; then
    FIX=1
else
    FIX=0
fi

if [ "$FIX" = 1 ]; then
	# Sniff and fix
	vendor/bin/phpcbf --standard=vendor/spryker/code-sniffer/Spryker/ruleset.xml -v --ignore=code-generator/vendor/,tests/files/ ./
else
	# Sniff only
	vendor/bin/phpcs --standard=vendor/spryker/code-sniffer/Spryker/ruleset.xml -v --ignore=code-generator/vendor/,tests/files/ ./
fi