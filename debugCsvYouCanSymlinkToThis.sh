#!/bin/bash
LOC=$(dirname $(readlink -n $BASH_SOURCE))
php $LOC/debugCsv.php "$@"