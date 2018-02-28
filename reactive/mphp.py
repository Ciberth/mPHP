import os
import pwd

from subprocess import call

from charms.reactive import set_flag, clear_flag, when, when_not, when_any
from charms.reactive import set_state, remove_state
from charms.reactive.relations import endpoint_from_flag
from charms.reactive.helpers import data_changed

from charmhelpers.core.templating import render
from charmhelpers.core.hookenv import status_set, log, config
from charmhelpers.core import templating, unitdata


# Install mPHP

@when('apache.available', 'database.available')
@when_not('mPHP.installed')
def install_mPHP(mysql):
    # Copy files
    render(source='config.php', 
            target='/var/www/mphp/config.php',
            owner='www-data',
            perms=0o775,
            context={
                'db': mysql,
            })
    status_set('active', 'ready')
    set_state('apache.start')
    set_state('mPHP.installed')

@when('apache.available')
@when_not('database.connected')
def missing_mysql_relation():
    remove_state('apache.start')
    status_set('waiting', 'Waiting for mysql relation')

@when('apache.started')
def apache_started():
    status_set('active', 'Apache ready')
