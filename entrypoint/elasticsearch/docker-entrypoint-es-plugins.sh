#!/bin/bash
# setting up prerequisites

/usr/share/elasticsearch/bin/elasticsearch-plugin install analysis-icu
/usr/share/elasticsearch/bin/elasticsearch-plugin install analysis-phonetic

exec /usr/local/bin/docker-entrypoint.sh elasticsearch