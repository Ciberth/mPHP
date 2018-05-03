import pwd
import os
from subprocess import call
from charmhelpers.core import host
from charmhelpers.core.hookenv import log, status_set, unit_get
from charmhelpers.core.templating import render
from charms.reactive import when, when_not, set_flag, clear_flag

@when('apache.available')
@when_not('mysqldatabase.connected')
def waiting_mysql_relation():
    status_set('waiting', 'waiting for mysql relation')

@when('apache.available', 'mysqldatabase.connected')
def request_db(database):
    host = unit_get('private-address')
    database.configure('proto', 'admin', host, prefix="proto")
    log("db requested")
    status_set('maintenance', 'requested db')

@when('apache.available', 'mysqldatabase.available')
def setup_app(mysql):
    render(source='mysql_configure.php',
        target='/var/www/proto-adminer/mysql_configure.php',
        owner='www-data',
        perms=0o775,
        context={
            'db': mysql,
            'db_host': mysql.db_host(),
            'db_username': mysql.username("proto"),
            'db_password': mysql.password("proto"),
            'db_databasename': mysql.database("proto"),
        })
    log("in setup function")
    status_set('maintenance', 'Setting up application')
    set_flag('restart-app')


@when('restart-app')
def restart_app():
    host.service_reload('apache2')
    clear_flag('restart-app')
    status_set('active', 'app ready')
