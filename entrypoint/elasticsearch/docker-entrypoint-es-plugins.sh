#!/bin/bash
# setting up prerequisites

plugin install analysis-icu
plugin install analysis-phonetic

exec /docker-entrypoint.sh elasticsearch