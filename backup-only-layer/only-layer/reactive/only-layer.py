import pwd
import os
from subprocess import call
from charmhelpers.core import host
from charmhelpers.core.hookenv import log, status_set
from charmhelpers.core.templating import render
from charms.reactive import when, when_not, set_flag, clear_flag

@when('apache.available')
def finishing_up_setting_up_sites():
    log("website.available flag - functie")
    host.service_reload('apache2')
    set_flag('apache.start')

@when('apache.start')
def ready():
    log("website.start flag")
    host.service_reload('apache2')
    status_set('active', 'apache ready')


