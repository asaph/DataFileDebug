#!/bin/bash
LOC=$(dirname $(readlink -n $BASH_SOURCE))
php $LOC/debugJson.php "$@"