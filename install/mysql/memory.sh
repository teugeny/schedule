#!/bin/bash

m=$MYSQL_MEMORY_LIMIT

cat <<EOF > /etc/mysql/conf.d/10-memory.cnf
[mysqld]

key_buffer_size         = 16M
max_allowed_packet      = 16M
thread_stack            = 192K
thread_cache_size       = 32
query_cache_limit       = 16M
query_cache_size        = 128M
max_binlog_size   = 256M

innodb_log_file_size = 256M
innodb_buffer_pool_size = $(($m/2))M

EOF